<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About Us';
        $description = 'Blogging is website for sharing your thoughts and ideas with the world.';
        $button = '<a class="btn btn-lg btn-danger" href="/">Back to Landing Page</a>';

        $sponsors = [

            [
                "name" => "STMIK LIKMI",
                "image" => "https://likmi.ac.id/wp-content/uploads/2018/09/Logo200.png",
                "link" => "https://likmi.ac.id"
            ],
            [
                "name" => "Bard",
                "image" => "https://www.suarasurabaya.net/wp-content/uploads/2023/09/Google-Bard.webp",
                "link" => "https://bard.google.com/"
            ],
            [
                "name" => "Bootstrap",
                "image" => "https://www.drupal.org/files/project-images/bootstrap5.jpeg",
                "link" => "https://getbootstrap.com/"
            ]
        ];

        $faqs = [
            [
                "question" => "What are the benefits of sponsoring a blogging website?",
                "answer" => "When your brand is featured on our popular website, it will be seen by a large audience of potential customers.",
            ],
            [
                "question" => "How much does it cost to sponsor our website?",
                "answer" => "The cost of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
            ],
            [
                "question" => "How long does it take to sponsor our website?",
                "answer" => "The length of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
            ],
            [
                "question" => "How do I sponsor your website?",
                "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
            ],
            [
                "question" => "How do I contact you?",
                "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
            ]
        ];
        return view('about', ['title' => $title, 'description' => $description, 'button' => $button, 'sponsors' => $sponsors, 'faqs' => $faqs]);
    }
}
