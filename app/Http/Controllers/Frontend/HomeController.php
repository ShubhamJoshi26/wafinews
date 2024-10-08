<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\RecivedMail;
use App\Models\SocialCount;
use App\Models\SocialLink;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1,])
            ->activeEntries()->withLocalize()->with('subCategory','category')->orderBy('id', 'DESC')->take(10)->get();
        $heroSlider = News::with(['category', 'auther','subCategory'])
            ->where('show_at_slider', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')->take(7)
            ->get();
        $recentNews = News::with(['category', 'auther','subCategory'])->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')->take(6)->get();
        $popularNews = News::with(['category','subCategory'])->where('show_at_popular', 1)
            ->activeEntries()->withLocalize()
            ->orderBy('updated_at', 'DESC')->take(4)->get();

        $HomeSectionSetting = HomeSectionSetting::where('language', getLangauge())->first();

        if ($HomeSectionSetting) {
            $categorySectionOne = News::where('category_id', $HomeSectionSetting->category_section_one)
                ->activeEntries()->withLocalize()->with('category','auther','subCategory')
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionTwo = News::where('category_id', $HomeSectionSetting->category_section_two)
                ->activeEntries()->withLocalize()->with('subCategory','category')
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionThree = News::where('category_id', $HomeSectionSetting->category_section_three)
                ->activeEntries()->withLocalize()->with('subCategory','category')
                ->orderBy('id', 'DESC')
                ->take(6)
                ->get();

            $categorySectionFour = News::where('category_id', $HomeSectionSetting->category_section_four)
                ->activeEntries()->withLocalize()->with('subCategory','category')
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
            
            $categorySectionFive = News::where('category_id', $HomeSectionSetting->category_section_five)
                ->activeEntries()->withLocalize()->with('subCategory','category')
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
            $categorySectionSix = News::where('category_id', $HomeSectionSetting->category_section_six)
                ->activeEntries()->withLocalize()->with('subCategory','category')
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
        } else {
            $categorySectionOne = collect();
            $categorySectionTwo = collect();
            $categorySectionThree = collect();
            $categorySectionFour = collect();
            $categorySectionFive = collect();
            $categorySectionSix = collect();
        }


        $mostViewedPosts = News::activeEntries()->withLocalize()->with('subCategory','category')
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $mostCommonTags = $this->mostCommonTags();

        $ad = Ad::first();

        $socialLinks = SocialLink::where('status',1)->get();
        
        return view('home', compact(
            'breakingNews',
            'heroSlider',
            'recentNews',
            'popularNews',
            'categorySectionOne',
            'categorySectionTwo',
            'categorySectionThree',
            'categorySectionFour',
            'categorySectionFive',
            'categorySectionSix',
            'mostViewedPosts',
            'socialCounts',
            'mostCommonTags',
            'ad',
            'socialLinks'
        ));
    }

    public function ShowNews(string $category_id,string $subcategoryid,string $slug)
    {
        $news = News::with(['auther', 'tags', 'comments','subCategory','category'])->where('slug', $slug)
            ->activeEntries()->withLocalize()
            ->first();

        $this->countView($news);

        $recentNews = News::with(['category', 'auther','subCategory','category'])->where('slug', '!=', $news->slug)
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();

        $mostCommonTags = $this->mostCommonTags();

        $nextPost = News::where('id', '>', $news->id)
            ->activeEntries()
            ->withLocalize()->with('subCategory','category')
            ->orderBy('id', 'asc')->first();

        $previousPost = News::where('id', '<', $news->id)
            ->activeEntries()
            ->withLocalize()->with('subCategory','category')
            ->orderBy('id', 'desc')->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)->with('subCategory','category')
            ->where('category_id', $news->category_id)
            ->activeEntries()
            ->withLocalize()
            ->take(5)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();

        return view('news-details', compact('news', 'recentNews', 'mostCommonTags', 'nextPost', 'previousPost', 'relatedPosts', 'socialCounts', 'ad'));
    }

    public function news(Request $request)
    {

        $news = News::query();

        $news->when($request->has('tag'), function ($query) use ($request) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        });

        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            })->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        });

        $news = $news->activeEntries()->withLocalize()->paginate(20);


        $recentNews = News::with(['category', 'auther'])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();
        $mostCommonTags = $this->mostCommonTags();

        $categories = Category::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();

        return view('frontend.news', compact('news', 'recentNews', 'mostCommonTags', 'categories', 'ad'));
    }

    public function countView($news)
    {
        if (session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');

            if (!in_array($news->id, $postIds)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);
        } else {
            session(['viewed_posts' => [$news->id]]);

            $news->increment('views');
        }
    }

    public function mostCommonTags()
    {
        return Tag::select('name', DB::raw('COUNT(*) as count'))
            ->where('language', getLangauge())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request)
    {

        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');
        return redirect()->back();
    }

    public function handleReplay(Request $request)
    {

        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDestory(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => __('frontend.Deleted Successfully!')]);
        }

        return response(['status' => 'error', 'message' => __('frontend.Someting went wrong!')]);
    }

    public function SubscribeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:subscribers,email']
        ], [
            'email.unique' => __('frontend.Email is already subscribed!')
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => __('frontend.Subscribed successfully!')]);
    }

    public function about()
    {
        $about = About::where('language', getLangauge())->first();
        return view('about', compact('about'));
    }

    public function contact()
    {
        $contact = Contact::where('language', getLangauge())->first();
        $socials = SocialLink::where('status', 1)->get();
        return view('frontend.contact', compact('contact', 'socials'));
    }

    public function handleContactFrom(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500']
        ]);

        try {
            $toMail = Contact::where('language', 'en')->first();

            /** Send Mail */
            Mail::to($toMail->email)->send(new ContactMail($request->subject, $request->message, $request->email));

            /** store the mail */

            $mail = new RecivedMail();
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        } catch (\Exception $e) {
            toast(__($e->getMessage()));
        }

        toast(__('frontend.Message sent successfully!'), 'success');

        return redirect()->back();
    }

    public function categoryList($catSlug)
    {
        $categoryId = Category::where('slug',$catSlug)->get(['id','name']);
        if($categoryId!=null && count($categoryId)>0)
        {
            $allNews = News::where('category_id',$categoryId[0]['id'])->with('subCategory','category')->latest()
            ->paginate(2)
            ->withQueryString();
            $allSubCategory = SubCategory::where('category_id',$categoryId[0]['id'])->get();
            $popularNews = News::with(['category','subCategory'])->where('show_at_popular', 1)
            ->activeEntries()->withLocalize()
            ->orderBy('updated_at', 'DESC')->take(4)->get();
            $socialLinks = SocialLink::where('status',1)->get();
            return view('news-list',compact('allNews','allSubCategory','categoryId','popularNews','socialLinks'));
        }
        else
        {
            return redirect()->back()->with('error','Category Not Found');
        }
    }
}
