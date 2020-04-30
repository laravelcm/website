import React, { useEffect, useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Tutorial from "@/components/Tutorial";

const Tutorials = () => {
  const { tutorial_categories } = usePage();
  const [categories, setCategories] = useState<Array<{ id: number; name: string; slug: string }>>([]);

  useEffect(() => {
    setCategories(tutorial_categories);
  }, []);

  return (
    <>
      <Seo
        title="Tutoriels"
        description="Vidéos sur le développement Web (Front et Back-end) et de Design Web (UI/UX) pour vous aidez à faire passer vos compétences au niveau supérieur."
      />
      <div className="bg-white pt-10 pb-12 lg:pt-24 lg:pb-40">
        <div className="container">
          <img
            className="absolute hidden lg:block"
            style={{ top: "-50px", right: "100px" }}
            src={require("@/assets/images/stacks.svg")}
            alt="stacks"
          />
          <div className="w-full lg:w-120">
            <h1 className="text-brand-primary text-lg mb-4 lg:text-3xl lg:mb-8">Tous les tutoriels</h1>
            <p className="text-sm">
              Vidéos sur le développement Web (Front et Back-end) et de Design
              Web (UI/UX) pour vous aidez à faire passer vos compétences au
              niveau supérieur.
            </p>
          </div>
        </div>
      </div>
      <div className="container md:px-4">
        <div className="bg-brand-primary overflow-hidden overflow-x-scroll hidden-scrollbar flex justify-center items-center py-5 rounded text-white -mt-6">
          <ul className="w-full lg:max-w-4xl mx-auto px-10 lg:px-0 text-sm inline-flex space-x-2">
            <li className="inline-block mr-4">
              <InertiaLink
                href="/"
                className="rounded-full bg-brand-900 font-semibold px-3 py-1"
              >
                Tous
              </InertiaLink>
            </li>
            {
              categories.map((category: { id: number; name: string; slug: string }) => (
                <li className="inline-block" key={category.id}>
                  <InertiaLink
                    href={`/tutorial/category/${category.slug}`}
                    className="hover:text-white hover:bg-green-500 px-3 py-1 rounded-full"
                  >
                    {category.name}
                  </InertiaLink>
                </li>
              ))
            }
          </ul>
        </div>
        <div className="mt-12 grid gap-6 max-w-lg mx-auto md:grid-cols-2 md:max-w-3xl lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none sm:mb-18">
          <Tutorial
            image="https://cdn.devdojo.com/posts/images/June2019/laravel-on-digital-ocean.jpg?auto=compress&w=228&h=128&dpr=2"
            title="Laravel App on Digital Ocean Ubuntu 19.04 droplet (Step by Step Guide)"
          />
          <Tutorial
            image="https://cdn.devdojo.com/episode/images/February2019/larecipe.jpg?auto=compress&w=228&h=128&dpr=2"
            title="Larecipe Documentation Package"
          />
          <Tutorial
            image="https://cdn.devdojo.com/posts/images/June2019/how-to-setup-docker-on-ubuntu-1804.jpg?auto=compress&w=228&h=128&dpr=2"
            title="How to Setup Docker on Ubuntu 18.04"
          />
          <Tutorial
            image="https://cdn.devdojo.com/posts/images/June2019/how-to-setup-docker-on-ubuntu-1804.jpg?auto=compress&w=228&h=128&dpr=2"
            title="Tips for using Laravel's Scheduler"
          />
        </div>
      </div>
    </>
  );
};

Tutorials.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Tutorials;
