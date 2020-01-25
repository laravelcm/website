import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/layout";
import Seo from "@/includes/seo";

import Tutorial from "@/components/tutorial";


const Tutoriel = () => {
  return (
    <>
      <Seo
        title="Tutoriel"
        description="Vidéos sur le développement Web (Front et Back-end) et de Design Web (UI/UX) pour vous aidez à faire passer vos compétences au niveau supérieur."
      />
      <div className="bg-gradient-white pt-10 pb-12 lg:pt-24 lg:pb-40">
        <div className="container">
          <img className="absolute hidden lg:block" style={{ top: "-50px", right: "100px" }} src={require("@/assets/images/stacks.svg")} alt="stacks" />
          <div className="w-full lg:w-120">
            <h1 className="text-brand-primary text-lg mb-4 lg:text-3xl lg:mb-8">Tous les tutoriels</h1>
            <p className="text-sm">
              Vidéos sur le développement Web (Front et Back-end) et de Design Web (UI/UX) pour vous aidez à faire passer vos
              compétences au niveau supérieur.
            </p>
          </div>
        </div>
      </div>
      <div className="container md:px-4">
        <div className="bg-brand-primary overflow-hidden overflow-x-scroll hidden-scrollbar flex justify-center items-center py-5 rounded text-white -mt-6">
          <ul className="w-full lg:max-w-2xl mx-auto px-10 lg:px-0 text-sm inline-flex space-x-4">
            <li className="inline-block mr-4">
              <InertiaLink href="/" className="rounded-full bg-brand-900 font-semibold px-3 py-1">Tous</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">Laravel</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">React</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">React Native</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">VueJS</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">Flutter</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">Hosting</InertiaLink>
            </li>
            <li className="inline-block">
              <InertiaLink href="/" className="hover:text-gray-200">Design</InertiaLink>
            </li>
          </ul>
        </div>
        <div className="space-y-5 mt-12 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
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

Tutoriel.layout = (page: React.ReactNode) => <Layout children={page} />;

export default Tutoriel;
