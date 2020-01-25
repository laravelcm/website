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
        description="Lisez quelques-uns des derniers articles liés au développement et à la conception Web."
      />
      <div className="bg-gradient-white py-6">
        <div className="container">
          <div className="flex justify-around items-center pb-10">
            <div>
              <h1 className="text-brand-primary text-2xl mb-3">
                Tous les tutoriels
              </h1>
              <p className="text-gray-600 lg:w-116">
                Vidéos sur le développement Web (Front et Back-end) et de Design
                Web pour vous aider à faire passer vos compétences au niveau
                supérieur..
              </p>
            </div>
            <div>
              <img src={require("@/assets/images/stacks.svg")} alt="stacks" />
            </div>
          </div>
        </div>
      </div>
      <div className="container">
        <div className="overflow-hidden overflow-x-scroll btn-primary p-4 rounded-lg flex justify-around -mt-6">
          <ul className="text-sm inline-flex space-x-7">
            <li className="inline-block mr-6 rounded-full bg-brand-900">
              <InertiaLink
                href="/"
                className="hover:text-gray-600 font-semibold p-2"
              >
                Tous
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                Laravel
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                React
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                React Native
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                VueJS
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                Flutter
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                Hosting
              </InertiaLink>
            </li>
            <li className="inline-block mr-6">
              <InertiaLink
                href="/"
                className="hover:text-gray-600"
              >
                Integration
              </InertiaLink>
            </li>
          </ul>
        </div>
      </div>
      <div className="container mt-12 md:px-4">
        <div className="space-y-5 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
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
        <div className="space-y-5 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
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
        <div className="space-y-5 mb-10 md:space-y-0 md:flex md:-mx-4 flex-grow flex-wrap lg:mb-14">
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
