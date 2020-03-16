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
      <div className="pt-10 pb-12 bg-gradient-white lg:pt-20 lg:pb-24 lg:h-125 relative">
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
                        className="transition font-light focus:outline-none border border-transparent focus:bg-gray-100 focus:border-gray-300 placeholder-gray-600 rounded-md bg-gray-200 py-3 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
                        type="text"
                        placeholder="par poste, ville ou par société"
                        autoComplete="off"
                        style={{ position: "relative", verticalAlign: "top" }}
                      />
                    </span>
                    <div className="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                      <svg
                        className="fill-current pointer-events-none text-gray-600 w-4 h-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                      >
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                      </svg>
                    </div>
                  </div>
                </div>
                <button type="button" className="btn btn-primary py-3">
                  Rechercher
                </button>
              </form>
              <small className="text-xs text-gray-700">
                Plus de 1000 offres postées par environs 50 sociétes.
              </small>
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
                  <button className="flex text-sm items-center" type="button">
                    Effacer
                  </button>
                </div>
                <div className="space-y-2">
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Temps plein (90)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Freelance (29)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Stage (300)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Douala (190)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Yaounde (150)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Dakar (3)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">0-2 ans</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">2-7 ans</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Bureau</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Télé-travail</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Français (50)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
                      <input
                        type="checkbox"
                        className="form-checkbox text-brand-primary"
                      />
                      <span className="ml-2 text-gray-800">Anglais (75)</span>
                    </label>
                  </div>
                  <div>
                    <label className="inline-flex items-center">
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
              <p>
                <span className="font-medium text-gray-800">500</span> résultats
                trouvés
              </p>
              <div className="flex items-center space-x-2">
                <button type="button" className="flex items-center">
                  <span className="mr-1">Rangé par :</span>
                  <span className="text-gray-800 font-medium">
                    Date de publication
                  </span>
                  <svg
                    className="h-6 w-6 text-gray-600 ml-1"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M15.3 9.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3v.01z"
                      fill="currentColor"
                    />
                  </svg>
                </button>
                <button
                  type="button"
                  className={`flex items-center justify-center bg-white ${
                    display === "list" ? "text-brand-primary" : "text-gray-600"
                  } hover:text-brand-primary shadow-smooth rounded-md h-8 w-8`}
                  onClick={() => setDisplay(`list`)}
                >
                  <svg
                    className="h-6 w-6 fill-current"
                    fill="fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M17.39 13.198c.48 0 .87.378.87.844 0 .465-.39.843-.87.843H5.87a.857.857 0 01-.87-.843c0-.466.39-.844.87-.844h11.52zM5.87 6.688A.857.857 0 015 5.844C5 5.378 5.39 5 5.87 5h8.913c.48 0 .87.378.87.843 0 .467-.39.845-.87.845H5.87zm7.173 10.836c.48 0 .87.377.87.843a.857.857 0 01-.87.844H5.87a.857.857 0 01-.87-.844c0-.466.39-.843.87-.843h7.173zm6.088-8.544c.48 0 .869.377.869.843 0 .465-.39.843-.87.843H5.87A.857.857 0 015 9.823c0-.466.39-.843.87-.843h13.26z"
                      fill="currentColor"
                    />
                  </svg>
                </button>
                <button
                  type="button"
                  className={`flex items-center justify-center bg-white ${
                    display === "grid" ? "text-brand-primary" : "text-gray-600"
                  } hover:text-brand-primary shadow-smooth rounded-md h-8 w-8`}
                  onClick={() => setDisplay(`grid`)}
                >
                  <svg
                    className="h-6 w-6 fill-current"
                    fill="fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.667 5c.644 0 1.167.523 1.167 1.167v3.5c0 .644-.523 1.167-1.167 1.167h-3.5A1.167 1.167 0 015 9.667v-3.5C5 5.523 5.523 5 6.167 5h3.5zm8.166 0C18.477 5 19 5.523 19 6.167v3.5c0 .644-.523 1.167-1.167 1.167h-3.5a1.167 1.167 0 01-1.167-1.167v-3.5c0-.644.523-1.167 1.167-1.167h3.5zm-8.166 8.167c.644 0 1.167.523 1.167 1.167v3.5c0 .644-.523 1.166-1.167 1.166h-3.5A1.167 1.167 0 015 17.834v-3.5c0-.644.523-1.167 1.167-1.167h3.5zm8.166 0c.644 0 1.167.523 1.167 1.167v3.5c0 .644-.523 1.166-1.167 1.166h-3.5a1.167 1.167 0 01-1.167-1.166v-3.5c0-.644.523-1.167 1.167-1.167h3.5z"
                      fill="currentColor"
                    />
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
