import React, { useEffect, useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Tutorial from "@/components/Tutorial";
import Pagination from "@/components/Pagination";
import { TutorialType } from "@/utils/types";

const Tutorials = () => {
  const { tutorial_categories, tutorials, category } = usePage();
  const { data, links } = tutorials;
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
            <h1 className="text-brand-primary text-lg mb-4 lg:text-3xl lg:mb-8 font-semibold">Tous les tutoriels</h1>
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
          <ul className="w-full lg:max-w-4xl mx-auto px-10 lg:px-0 text-sm inline-flex items-center justify-center space-x-2">
            {
              categories.map((c: { id: number; name: string; slug: string }) => (
                <li className="inline-block" key={c.id}>
                  <InertiaLink
                    href={`/tutorial/category/${c.slug}`}
                    className={`hover:text-white px-3 py-1 rounded-full ${c.id === category.id ? 'bg-green-500' : 'hover:bg-green-500'}`}
                  >
                    {c.name}
                  </InertiaLink>
                </li>
              ))
            }
          </ul>
        </div>
        <div className="mt-12 grid gap-6 max-w-lg mx-auto md:grid-cols-2 md:max-w-3xl lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none sm:mb-18">
          {data.map((tutorial: TutorialType) => <Tutorial key={tutorial.id} tutorial={tutorial} />)}
        </div>
        <Pagination links={links} />
      </div>
    </>
  );
};

Tutorials.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Tutorials;
