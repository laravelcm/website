<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;
use Modules\Forum\Repositories\ThreadRepository;

class HomeController extends Controller
{
    /**
     * @var ThreadRepository
     */
    protected ThreadRepository $threadRepository;

    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    /**
     * HomeController constructor.
     *
     * @param  ThreadRepository $threadRepository
     * @param  PostRepository $postRepository
     */
    public function __construct(ThreadRepository $threadRepository, PostRepository $postRepository)
    {
        $this->threadRepository = $threadRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Return HomePage view.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $threads = $this->threadRepository
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get()
            ->each(fn($thread) => $thread->title = Str::limit($thread->title, 30));

        $posts = Post::publish()
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        return Inertia::render('home/Index', [
            'threads' => $threads,
            'posts' => $posts
        ]);
    }

    /**
     * Display Privacy View.
     *
     * @return \Inertia\Response
     */
    public function privacy()
    {
        return Inertia::render('commons/Privacy');
    }

    /**
     * Display Privacy View.
     *
     * @return \Inertia\Response
     */
    public function terms()
    {
        return Inertia::render('commons/Terms');
    }

    /**
     * Display Invite Slack form.
     *
     * @return \Inertia\Response
     */
    public function slack()
    {
        return Inertia::render('commons/Slack');
    }

    /**
     * Get a slack invitation.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function joinSlack(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $client = new Client();
        $team   = env('SLACK_TEAM_NAME', 'Laravel Cameroon');
        $email = $request->input('email');

        // Sent slack invitation
        try {
            $client->request('POST',
                env('SLACK_TEAM_URL').'/api/users.admin.invite?t='
                .time().'&email='.$email.'&token='.env('SLACK_API_TOKEN')
                .'&set_active=true&_attempts=1');

            return response()->json([
                'message' => "Une invitation vous a été envoyé à votre courrier pour rejoindre l'espace de travail {$team}.",
                'status' => 'success',
            ]);

        } catch (GuzzleException $e) {

            return response()->json([
                'message' => "Une erreur s'est produite lors de l'envoi de l'invitation, veuillez réessayer.",
                'server_message' => $e->getMessage(),
                'status' => 'error',
            ]);
        }
    }
}
