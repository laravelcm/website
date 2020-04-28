import React, { useState } from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import ListView from "@/components/ListView";
import GridView from "@/components/GridView";

const Jobs = () => {
  const [display, setDisplay] = useState(`list`);

  return (
    <>
      <Seo
        title="Jobs"
        description="Votre futur dépendra du travail que vous allez obtenir aujourd’hui. Rejoignez plusieurs autres rechercheurs et demandeurs d’emploi. La meilleure façon de trouver un nouveau job."
      />
      <div className="pt-10 pb-12 bg-white lg:pt-20 lg:pb-24 lg:h-125 relative">
        <img
          src={require("@/assets/images/job-illustration.svg")}
          className="hidden lg:block absolute right-0"
          style={{ top: "32px", right: "100px" }}
          alt="illustration"
        />
        <div className="container">
          <div className="w-full lg:w-1/2">
            <h1 className="text-brand-primary text-2xl md:text-3xl mb-6 lg:text-4xl lg:mb-8 font-bold">
              Votre passion commence ici !
            </h1>
            <p className="text-sm mb-10 lg:w-140 lg:text-sm lg:mb-10">
              Votre futur dépendra du travail que vous allez obtenir
              aujourd’hui. Rejoignez plusieurs autres rechercheurs et demandeurs
              d’emploi. La meilleure façon de trouver un nouveau job.
            </p>
            <div className="mb-3">
              <form action="#" className="flex mb-3">
                <div className="w-full mr-2">
                  <div className="relative">
                    <span
                      className="relative block"
                      style={{ direction: "ltr" }}
                    >
                      <input
                        className="text-base focus:outline-none focus:bg-gray-100 placeholder-gray-600 rounded-md bg-gray-200 py-3 pr-4 pl-12 block w-full appearance-none transition duration-150 ease-in-out"
                        type="text"
                        placeholder="par poste, ville ou par société"
                        autoComplete="off"
                        style={{ position: "relative", verticalAlign: "top" }}
                      />
                    </span>
                    <div className="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                      <svg className="text-gray-600 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                    </div>
                  </div>
                </div>
                <button type="button" className="btn btn-primary py-3">Rechercher</button>
              </form>
              <small className="text-xs text-gray-700">Plus de 1000 offres postées par environs 30 sociétes.</small>
            </div>
            <div className="flex space-x-2 items-center">
              <img src={require("@/assets/brands/canal2.png")} alt="Canal 2" />
              <img src={require("@/assets/brands/dikalo.png")} alt="Dikalo" />
              <img src={require("@/assets/brands/kiroo.png")} alt="Kirro" />
            </div>
          </div>
        </div>
      </div>
      <div className="container mt-12 lg:mt-20">
        <div className="flex">
          <div className="hidden lg:flex flex-col w-3/12">
            <div className="space-y-8 sticky top-16">
              <div className="flex justify-between items-end">
                <h4 className="text-xl font-medium text-gray-900">Filtres</h4>
                <button className="flex text-sm items-center" type="button">
                  <svg
                    className="h-4 w-4 text-gray-600 mr-1"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.079 7.222h-1.16A6.38 6.38 0 018.294.848a6.38 6.38 0 016.373 6.374c0 3.459-2.77 6.28-6.21 6.368v1.743l-2.608-2.317 2.608-2.319v1.736a5.221 5.221 0 005.052-5.21 5.22 5.22 0 00-5.215-5.215A5.22 5.22 0 003.08 7.222z"
                      fill="currentColor"
                    />
                  </svg>
                  <span>Réinitialiser</span>
                </button>
              </div>
              <div>
                <div className="flex justify-between items-end mb-6">
                  <h5 className="uppercase font-medium">Type d'emploi</h5>
                  <button className="flex text-sm items-center" type="button">Effacer</button>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Temps plein (90)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">
                        Temps partiel (20)
                      </span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Freelance (29)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Stage (300)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Étudiant (13)</span>
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <div className="flex justify-between items-end mb-6">
                  <h5 className="uppercase font-medium">Localisation</h5>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Douala (190)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Yaounde (150)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">
                        Ile de France (29)
                      </span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Dakar (3)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Lagos (13)</span>
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <div className="flex justify-between items-end mb-6">
                  <h5 className="uppercase font-medium">Niveau d'experience</h5>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">0-2 ans</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">2-7 ans</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">7 ans et +</span>
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <div className="flex justify-between items-end mb-6">
                  <h5 className="uppercase font-medium">Lieu de service</h5>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Bureau</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Télé-travail</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">
                        Bureau ou télé-travail
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <div className="flex justify-between items-end mb-6">
                  <h5 className="uppercase font-medium">Langue</h5>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Français (50)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Anglais (75)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Espagnol (29)</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="w-full lg:w-8/12 lg:ml-20">
            <div className="flex flex-col justify-between lg:items-center lg:flex-row mb-8">
              <p><span className="font-medium text-gray-800">500</span> résultats trouvés.</p>
              <div className="flex items-center space-x-2">
                <button type="button" className="flex items-center">
                  <span>Rangé par :</span>
                  <span className="text-gray-800 font-medium mx-1">Date de publication</span>
                  <svg className="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
                <button
                  type="button"
                  className={`flex items-center justify-center bg-white ${
                    display === "list" ? "text-brand-primary" : "text-gray-600"
                  } hover:text-brand-primary shadow-smooth rounded-md h-8 w-8`}
                  onClick={() => setDisplay(`list`)}
                >
                  <svg className="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                  </svg>
                </button>
                <button
                  type="button"
                  className={`flex items-center justify-center bg-white ${
                    display === "grid" ? "text-brand-primary" : "text-gray-600"
                  } hover:text-brand-primary shadow-smooth rounded-md h-8 w-8`}
                  onClick={() => setDisplay(`grid`)}
                >
                  <svg className="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                  </svg>
                </button>
              </div>
            </div>
            {display === `list` && <ListView />}
            {display === `grid` && <GridView />}
          </div>
        </div>
      </div>
    </>
  );
};

Jobs.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Jobs;
