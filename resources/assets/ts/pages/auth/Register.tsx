import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Auth";
import Seo from "@/includes/Seo";

const Register = () => {
  return (
    <>
      <Seo title="Création de compte" />
      <div className="flex justify-between">
        <span />
        <p className="text-sm text-gray-600">Déja membre ? <InertiaLink href="/login" className="link">Se connecter</InertiaLink></p>
      </div>
      <div className="w-full md:w-3/4 lg:w-162 mb-16 mt-12 mx-auto">
        <h1 className="text-2xl font-medium text-gray-700 mb-6">Créer son compte sur Laravel Cameroun</h1>
        <div className="flex flex-col md:flex-row justify-between">
          <a href="/login/github" className="flex bg-brand-github text-base text-white px-10 py-3 rounded-md hover:bg-gray-900 mb-4 md:mb-0">
            <svg className="h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.001 0C4.475-.002 0 4.593 0 10.264c0 4.485 2.8 8.297 6.699 9.697.525.135.444-.248.444-.51v-1.778c-3.032.365-3.155-1.696-3.358-2.04-.411-.721-1.383-.905-1.093-1.25.69-.364 1.395.093 2.21 1.33.59.897 1.74.746 2.324.596.127-.539.4-1.021.775-1.395-3.141-.578-4.45-2.548-4.45-4.889 0-1.136.364-2.18 1.079-3.022-.456-1.389.042-2.578.11-2.755 1.297-.119 2.647.955 2.752 1.04.737-.204 1.58-.312 2.522-.312.948 0 1.793.112 2.537.319.252-.197 1.503-1.12 2.71-1.008.065.177.552 1.338.123 2.709.724.844 1.092 1.898 1.092 3.036 0 2.346-1.318 4.317-4.468 4.886.27.273.484.598.63.957.146.358.221.743.22 1.132v2.582c.019.207 0 .411.336.411C17.151 18.63 20 14.79 20 10.266 20 4.593 15.522 0 10.001 0z" fill="currentColor" />
            </svg>
            S'incrire avec Github
          </a>
          <a href="/login/google" className="flex bg-white shadow-md text-base text-gray-800 px-10 py-3 rounded-md hover:bg-gray-100">
            <svg className="h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.99 10.187c0-.82-.069-1.417-.216-2.037H10.2v3.698h5.62c-.113.919-.725 2.303-2.084 3.233l-.02.124 3.028 2.292.21.02c1.926-1.738 3.037-4.296 3.037-7.33z" fill="#4285F4" />
              <path d="M10.2 19.931c2.753 0 5.064-.886 6.753-2.414l-3.218-2.436c-.862.587-2.017.997-3.536.997a6.126 6.126 0 01-5.801-4.141l-.12.01-3.148 2.38-.041.112c1.677 3.256 5.122 5.492 9.11 5.492z" fill="#34A853" />
              <path d="M4.397 11.937a6.009 6.009 0 01-.34-1.971c0-.687.125-1.351.33-1.971l-.007-.132-3.187-2.42-.104.05A9.79 9.79 0 000 9.965a9.79 9.79 0 001.088 4.473l3.308-2.502z" fill="#FBBC05" />
              <path d="M10.2 3.853c1.914 0 3.206.809 3.943 1.484l2.878-2.746C15.253.985 12.953 0 10.199 0 6.211 0 2.766 2.237 1.09 5.492l3.297 2.503A6.152 6.152 0 0110.2 3.853z" fill="#EB4335" />
            </svg>
            S'incrire avec Google
          </a>
        </div>
        <div className="my-6 flex items-center space-x-5">
          <hr className="w-full bg-gray-400" />
          <span className="text-sm text-gray-600">Ou</span>
          <hr className="w-full bg-gray-400" />
        </div>
        <div className="p-8 bg-white shadow-smooth rounded-md">
          <div className="w-full">
            <div className="flex flex-wrap -mx-3 mb-3">
              <div className="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-first-name">Nom</label>
                <input
                  className="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                  id="grid-first-name"
                  type="text"
                />
              </div>
              <div className="w-full md:w-1/2 px-3">
                <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-last-name">Prénom</label>
                <input
                  className="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                  id="grid-last-name"
                  type="text"
                />
              </div>
            </div>
            <div className="w-full mb-3">
              <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-username">Nom d'utilisateur (pseudo)</label>
              <input
                className="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                id="grid-username"
                type="text"
              />
              <p className="text-gray-500 text-xs mt-2">Pas d'espaces ni de caractères spéciaux (les tirets “-” sont acceptés)</p>
            </div>
            <div className="w-full mb-3">
              <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-email">Adresse Email</label>
              <input
                className="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                id="grid-email"
                type="email"
              />
            </div>
            <div className="w-full">
              <label className="block tracking-wide text-gray-800 text-sm mb-2" htmlFor="grid-password">Mot de passe</label>
              <input
                className="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                id="grid-password"
                type="password"
              />
            </div>
          </div>
          <button className="btn btn-primary mt-6">Créer mon compte</button>
        </div>
        <p className="mt-8 text-sm">
          Ce formulaire utilise <a className="text-gray-800" href="https://www.google.com/recaptcha/intro/v3.html" target="_blank" rel="noopener noreferrer">reCAPTCHA</a>. L'utilisation de cette fonctionnalité est soumise aux {` `}
          <a className="link" href="https://policies.google.com/privacy?hl=fr" target="_blank" rel="noopener noreferrer">Règles de confidentialité</a> et aux {` `}
          <a className="link" href="https://policies.google.com/terms?hl=fr" target="_blank" rel="noopener noreferrer">Conditions d'utilisation</a> de Google.
        </p>
      </div>
    </>
  )
};

const description = `Créez votre compte gratuitement pour accéder à des articles, des tutoriels, et participer aux sujets de discussion sur le forum. Accéder à plusieurs ressources pour les développeurs. Vous pouvez également gagner des lots et surprises en débloquant des badges et en rejoignant la communauté.`;

Register.layout = (page: React.ReactNode) => <Layout child={page} description={description} />;

export default Register;
