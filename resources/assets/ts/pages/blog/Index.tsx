import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Post from "@/components/Post";

const Blog = () => (
  <>
    <Seo
      title="Blog"
      description="Lisez quelques-uns des derniers articles liés au développement et à la conception Web."
    />
    <div className="bg-gradient-white py-6">
      <div className="container">
        <div className="w-full">
          <h1 className="text-brand-primary text-xl mb-3">Articles</h1>
          <p className="text-sm text-gray-600 lg:w-116">
              Lisez quelques-uns des derniers articles liés au développement et
              à la conception Web.
          </p>
        </div>
        <hr className="w-full bg-gray-200 mt-10 mb-6" />
        <div className="text-center overflow-hidden overflow-x-scroll hidden-scrollbar">
          <ul className="text-sm inline-flex">
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600 font-semibold"
              >
                  Populaires
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  Laravel
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  React
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  React Native
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  VueJS
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  Flutter
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  Hosting
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  Firebase
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  JavaScript
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="text-gray-700 hover:text-gray-600"
              >
                  Design
              </InertiaLink>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div className="container mt-12 md:px-4">
      <div className="space-y-5 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
        <Post
          image="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2019/05/tailwindcss.png?resize=2200%2C1125"
          title="Going Full-Time on Tailwind CSS"
          profile="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4"
          name="Adam Wathan"
          datetime="Le 28 Decembre, 2019"
        />
        <Post
          image="https://i2.wp.com/wp.laravel-news.com/wp-content/uploads/2019/09/laravel6.jpg?fit=2200%2C1125&ssl=1?resize=1400%2C709"
          title="Laravel Snippet #21: 'Artisan Inspire', Vapor multi-domaine"
          profile="https://avatars0.githubusercontent.com/u/463230?s=460&v=4"
          name="Taylor Otwell"
          datetime="Le 10 Janvier, 2020"
        />
        <Post
          image="https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2019/11/laravel-notify.png?fit=2220%2C1125&ssl=1?resize=2200%2C1125"
          title="Create Flexible Notification with Laravel Notify"
          profile="https://avatars2.githubusercontent.com/u/14105989?s=460&v=4"
          name="Arthur Monney"
          datetime="Le 12 Janvier, 2020"
        />
        <Post
          image="https://cdn.devdojo.com/posts/images/June2019/how-to-setup-docker-on-ubuntu-1804.jpg?auto=compress&w=228&h=128&dpr=2"
          title="Tips for using Laravel's Scheduler"
          profile="https://avatars3.githubusercontent.com/u/4902424?s=460&v=4"
          name="Fabrice Yopa"
          datetime="Le 13 Janvier, 2020"
        />
      </div>
    </div>
  </>
);

Blog.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Blog;
