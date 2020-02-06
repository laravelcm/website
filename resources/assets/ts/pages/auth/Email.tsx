import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Auth";
import Seo from "@/includes/Seo";

const Email = () => {
  return (
    <>
      <Seo title="Mot de passe oublié?" />
      <div className="flex justify-between items-center">
        <InertiaLink href="/login">
          <svg className="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.41 11H21a1 1 0 110 2H5.41l5.3 5.3a1 1 0 01-1.42 1.4l-7-7a1 1 0 010-1.4l7-7a1 1 0 011.42 1.4L5.4 11h.01z" fill="currentColor" />
          </svg>
        </InertiaLink>
        <p className="text-sm text-gray-600">Pas encore membre ? <InertiaLink href="/register" className="link">Créer votre compte</InertiaLink></p>
      </div>
      <div className="w-full md:w-3/4 lg:w-125 mb-16 mt-12 mx-auto">
        <h1 className="text-2xl font-medium text-gray-700 mb-4">Mot de passe oublié?</h1>
        <p className="text-sm text-gray-600 mb-6">
          Saisissez l'adresse e-mail que vous avez utilisée lors de votre inscription et nous vous enverrons
          des instructions pour réinitialiser votre mot de passe.
        </p>
        <div className="p-8 bg-white shadow-smooth rounded-md">
          <div className="w-full mb-3">
            <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-email">Adresse Email</label>
            <input className="input-form" id="grid-email" type="email" placeholder="john.doe@gmail.com" />
          </div>
          <button className="btn btn-primary mt-6">Envoyer les instructions par mail</button>
        </div>
      </div>
    </>
  );
};

Email.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Email;
