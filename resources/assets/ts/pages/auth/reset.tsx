import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/auth";
import SEO from "@/includes/seo";

const Reset = () => {
  return (
    <>
      <SEO title="Réinitialisation du mot de passe" />
      <div className="flex justify-between items-center">
        <span />
        <p className="text-sm text-gray-600">Pas encore membre ? <InertiaLink href="/register" className="link">Créer votre compte</InertiaLink></p>
      </div>
      <div className="w-full md:w-3/4 lg:w-125 mb-16 mt-12 mx-auto">
        <h1 className="text-2xl font-medium text-gray-700 mb-4">Réinitialisation du mot de passe</h1>
        <div className="p-8 bg-white shadow-smooth rounded-md">
          <div className="w-full mb-3">
            <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-email">Adresse Email</label>
            <input className="input-form" id="grid-email" name="email" type="email" placeholder="john.doe@gmail.com" />
          </div>
          <div className="w-full mb-3">
            <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-email">Nouveau mot de passe</label>
            <input className="input-form" id="grid-password" name="password" type="password" />
          </div>
          <div className="w-full mb-3">
            <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-email">Confirmer mot de passe</label>
            <input className="input-form" id="grid-confirm-password" name="confirm_password" type="password" />
          </div>
          <button className="btn btn-primary mt-6">Réinitialiser mon mot de passe</button>
        </div>
      </div>
    </>
  );
};

Reset.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Reset;
