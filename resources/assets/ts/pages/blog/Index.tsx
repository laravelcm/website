import React from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Post from "@/components/Post";
import Pagination from "@/components/Pagination";
import { PostType } from "@/utils/types";

const Blog = () => {
  const { categories, posts } = usePage();
  const { data, links } = posts;

  return (
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
                  href="/blog?popular"
                  className="text-gray-700 hover:text-gray-600 font-semibold"
                >
                  Populaires
                </InertiaLink>
              </li>
              {
                categories.map((category: { id: number; name: string; slug: string }) => (
                  <li className="inline-block mr-6" key={category.id}>
                    <InertiaLink
                      href={`/blog/category/${category.slug}`}
                      className="text-gray-700 hover:text-gray-600"
                    >
                      {category.name}
                    </InertiaLink>
                  </li>
                ))
              }
            </ul>
          </div>
        </div>
      </div>
      <div className="container mt-12 md:px-4">
        <div className="space-y-5 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
          {data.map((post: PostType) => <Post key={post.id} post={post} />)}
        </div>
        <Pagination links={links} />
      </div>
    </>
  );
};

Blog.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Blog;
