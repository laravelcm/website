import React from "react";
import { usePage, InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";
import PostPublish from "@/components/PostPublish";
import MessageAlert from "@/components/MessageAlert";

import { PostType, ThreadType } from "@/utils/types";
import { timeAgo } from "@/utils/helpers";

const Publishing = () => {
  const { posts, threads } = usePage();

  return (
    <>
      <MessageAlert />
      <Seo title="Mes publications" />
      <Menu current="publishing" />
      <div className="container md:px-4 mt-6 sm:mt-10 md:mt-12">
        <div className="grid grid-cols-6 gap-6">
          <div className="col-span-6 md:col-span-4 md:pr-6">
            <div className="md:flex md:items-center md:justify-between mb-4 md:mb-8">
              <h2 className="text-lg text-gray-800 leading-5 tracking-wide sm:text-xl lg:text-2xl">
                Mes publications
              </h2>
              <div className="hidden flex-shrink-0 md:flex">
                <InertiaLink
                  href="/publishing/propose"
                  className="group inline-flex items-center text-sm text-brand-primary hover:underline active:text-brand-900"
                >
                  Proposer un article
                  <span className="ml-2 transform translate-x-0 group-hover:translate-x-2 transition duration-150 ease-in-out">
                    <svg
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      className="w-6 h-6"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3"
                      />
                    </svg>
                  </span>
                </InertiaLink>
              </div>
            </div>
            {posts.length === 0 && (
              <div className="bg-white rounded-md shadow-lg px-4 sm:px-8 py-6 sm:py-10 flex flex-col items-center justify-center">
                <img
                  src={require("@/assets/images/no-data.svg")}
                  className="mx-auto w-85"
                  alt="No data"
                />
                <p className="text-sm text-gray-500 leading-5 mt-2">
                  Vous n'avez pas encore proposé d'article.
                </p>
              </div>
            )}
            <ul className="space-y-6">
              {posts.map((post: PostType) => (
                <PostPublish key={post.id} post={post} />
              ))}
            </ul>
          </div>
          <div className="mt-4 md:mt-0 col-span-6 md:col-span-2">
            <h3 className="text-lg text-gray-800 leading-5 mb-4 md:mb-8 tracking-wide sm:text-xl">
              Mes sujets du Forum
            </h3>
            <ul className="divide-y divide-gray-200">
              {threads.map((thread: ThreadType) => (
                <li key={thread.id}>
                  <InertiaLink
                    href={thread.path}
                    className="block px-4 py-4 sm:px-6 focus:outline-none rounded-lg hover:bg-gray-100 transition ease-in-out duration-150"
                  >
                    <div className="flex items-start">
                      <div className="flex-shrink-0">
                        <img
                          className="h-12 w-12 rounded-full"
                          src={thread.creator.picture}
                          alt={thread.creator.full_name}
                        />
                      </div>
                      <div className="ml-4">
                        <p className="text-sm text-gray-500 leading-5">
                          Vous avez crée le sujet{" "}
                          <span className="text-gray-700 font-medium">
                            {thread.title}
                          </span>
                        </p>
                        <small className="text-gray-400 text-xs font-light mt-1">
                          {timeAgo(thread.created_at)}
                        </small>
                      </div>
                    </div>
                  </InertiaLink>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </>
  );
};

Publishing.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Publishing;
