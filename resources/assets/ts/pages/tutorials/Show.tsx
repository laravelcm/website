import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import Breadcrumb from "@/includes/Breadcrumb";

const Tutorial = () => (
  <>
    <Seo
      title="Laravel App on Digital Ocean Ubuntu 19.04 droplet (Step by Step Guide)"
      meta={[
        {
          property: `og:url`,
          content: `https://laravelcm.com`,
        },
        {
          property: `og:type`,
          content: `article`,
        },
        {
          property: `og:image`,
          content: `https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2019/11/laravel-notify.png?fit=2220%2C1125&ssl=1?resize=2200%2C1125`,
        },
      ]}
    />
    <Breadcrumb
      parentLink="/tutorials"
      parentTitle="Tutoriels"
      title="Laravel App on Digital Ocean Ubuntu 19.04 droplet (Step by Step Guide)"
    />
    <div className="container">
      <div className="w-full lg:w-10/12 mx-auto">
        <div className="mt-10 mb-12 w-full shadow-2xl h-100 md:h-120 lg:h-140">
          <iframe
            title="Laravel App on Digital Ocean Ubuntu 19.04 droplet (Step by Step Guide)"
            height="100%"
            width="100%"
            src="https://www.youtube.com/embed/QOSVjZ5jGkM"
          />
        </div>
      </div>
      <div className="mt-14 w-full flex flex-col lg:flex-row lg:flex-grow">
        <div className="hidden lg:flex items-center justify-center w-2/12 order-1 relative">
          <div className="flex mt-36 items-center absolute top-0">
            <div className="flex items-center flex-col space-y-6">
              <a href="/">
                <svg
                  className="text-brand-twitter w-4 h-3"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M14 1.414a5.533 5.533 0 01-1.65.475A3.003 3.003 0 0013.613.22a5.589 5.589 0 01-1.824.731A2.807 2.807 0 009.693 0C8.106 0 6.82 1.35 6.82 3.015c0 .237.026.467.075.688C4.508 3.577 2.39 2.376.975.552a3.117 3.117 0 00-.39 1.516c0 1.046.508 1.97 1.279 2.51a2.758 2.758 0 01-1.301-.377v.038c0 1.46.99 2.68 2.303 2.957-.423.12-.866.138-1.297.051.366 1.198 1.427 2.07 2.683 2.095A5.592 5.592 0 010 10.59a7.852 7.852 0 004.403 1.355c5.283 0 8.172-4.595 8.172-8.58 0-.13-.003-.26-.008-.39A6.008 6.008 0 0014 1.414z"
                    fill="currentColor"
                  />
                </svg>
              </a>
              <a href="/">
                <svg
                  className="w-2 h-4 text-brand-facebook"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M7.714.101v2.221H6.312c-.511 0-.857.101-1.035.303-.179.202-.268.505-.268.909v1.59h2.616l-.348 2.49H5.009V14H2.277V7.614H0v-2.49h2.277V3.29c0-1.044.31-1.853.928-2.428C3.825.287 4.65 0 5.68 0c.875 0 1.553.034 2.035.101z"
                    fill="currentColor"
                  />
                </svg>
              </a>
              <a href="/">
                <svg
                  className="h-4 w-4 text-brand-linkedin"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M0 1.53C0 1.088.158.72.473.434.788.144 1.198 0 1.703 0c.495 0 .896.142 1.202.426.316.293.473.674.473 1.145 0 .425-.153.78-.46 1.064-.314.293-.729.44-1.242.44h-.014c-.495 0-.896-.147-1.203-.44A1.464 1.464 0 010 1.531zm.176 11.646v-8.89h3v8.89h-3zm4.662 0h3V8.212c0-.31.036-.55.108-.719.126-.301.318-.557.574-.765.257-.209.58-.313.966-.313 1.01 0 1.514.67 1.514 2.01v4.751h3V8.08c0-1.313-.315-2.31-.946-2.988-.63-.679-1.464-1.018-2.5-1.018-1.162 0-2.068.492-2.716 1.477v.027h-.014l.014-.027V4.286h-3c.018.284.027 1.166.027 2.648 0 1.482-.01 3.563-.027 6.242z"
                    fill="currentColor"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div className="w-full order-1 mb-4 lg:mt-16 lg:w-2/12 lg:order-3">
          <div className="flex items-start space-x-8 lg:flex-col lg:space-x-0">
            <div className="w-1/3 lg:w-full lg:mb-4">
              <h5 className="text-base font-medium text-gray-700 mb-3 flex items-center">
                <svg
                  className="h-4 w-4 text-gray-700 mr-2"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9 13.965l-4.912 2.453A.75.75 0 013 15.75V3c0-.825.675-1.5 1.5-1.5h9A1.5 1.5 0 0115 3v12.75a.75.75 0 01-1.088.675L9 13.957v.008zM13.5 3h-9v11.535l4.162-2.078a.75.75 0 01.675 0l4.163 2.078V3z"
                    fill="currentColor"
                  />
                </svg>
                <span>Categorie</span>
              </h5>
              <div>
                <InertiaLink
                  href="/"
                  className="inline-block text-brand-laravel py-1 px-3 bg-opacity-laravel mr-2 rounded-full"
                >
                    Laravel
                </InertiaLink>
              </div>
            </div>
            <div className="w-1/3 lg:w-full lg:mb-4">
              <h5 className="text-base font-medium text-gray-700 mb-3 flex items-center">
                <svg
                  className="h-4 w-4 text-gray-700 mr-2"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M16 4.752v3.51l-.46.457c.249.542.975 2.548-.854 4.376-.537.538-1.39.82-2.258.82a3.68 3.68 0 01-1.696-.4L8.241 16 2 9.746 3.49 8.26l-.002-.002 4.437-4.422c-3.02-.089-5.396 1.568-5.43 1.593a.248.248 0 11-.289-.404c.039-.027 2.784-1.943 6.19-1.659L9.766 2h3.476L16 4.752zm-2.963-2.255H9.972l-.95.946A8.08 8.08 0 0112.03 4.59a.97.97 0 01.748-.357.978.978 0 11-.976.976c0-.057.006-.112.016-.167a7.592 7.592 0 00-3.237-1.159L4.193 8.26l5.538 5.55.57-.568c-.773-.587-1.636-1.831-.993-4.354a.248.248 0 11.481.122c-.455 1.788-.146 3.151.867 3.878l4.849-4.833V4.958l-2.468-2.461zm-.66 2.928l-.042-.03a.48.48 0 10.109-.528c.077.053.154.104.23.161a.248.248 0 11-.298.397zM2.702 9.747l5.54 5.552 1.14-1.137-5.54-5.551-1.14 1.136zm11.634 2.997c1.476-1.477 1.077-3.036.83-3.65l-4.064 4.052c1.156.528 2.595.237 3.234-.402z"
                    fill="currentColor"
                  />
                </svg>
                <span>Tags</span>
              </h5>
              <div>
                <InertiaLink
                  href="/"
                  className="inline-block text-brand-php py-1 px-3 bg-opacity-php mr-2 rounded-full"
                >
                    php
                </InertiaLink>
              </div>
            </div>
            <div className="flex items-center w-1/3 lg:w-full space-x-2 mb-3">
              <svg
                className="h-4 w-4 fill-current mr-2 text-gray-700"
                viewBox="0 0 25 25"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M17.56 17.66a8 8 0 01-11.32 0L1.3 12.7a1 1 0 010-1.42l4.95-4.95a8 8 0 0111.32 0l4.95 4.95a1 1 0 010 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 008.48 0L20.38 12l-4.24-4.24a6 6 0 00-8.48 0L3.4 12l4.25 4.24h.01zM11.9 16a4 4 0 110-8 4 4 0 010 8zm0-2a2 2 0 100-4 2 2 0 000 4z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-base font-medium text-gray-700">
                  Vues
              </span>
              <span className="text-base text-gray-800">2040</span>
            </div>
          </div>
        </div>
        <div className="w-full order-2 lg:w-8/12">
          <h1 className="text-xl text-gray-800 font-medium">
              Laravel App on Digital Ocean Ubuntu 19.04 droplet (Step by Step
              Guide)
          </h1>
          <div className="flex mt-6 lg:mt-14 items-center">
            <img
              src="https://avatars2.githubusercontent.com/u/14105989?s=460&v=4"
              className="h-12 w-12 rounded-full mr-4"
              alt="Arthur Monney"
            />
            <div className="flex flex-col">
              <h4 className="text-base text-gray-600">
                  Auteur{" "}
                <a
                  className="font-medium text-brand-primary hover:text-brand-900"
                  href="https://github.com/mckenziearts"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                    Arthur Monney
                </a>
              </h4>
              <small className="text-xs text-gray-500">
                  Le 12 Janvier, 2020
              </small>
            </div>
          </div>
          <div className="body-content mt-8 lg:mt-18 text-sm lg:text-base text-gray-600 relative">
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor
                est facere possimus voluptatem. A aliquam consectetur,
                dignissimos enim et hic in nostrum quae quas qui quibusdam quod
                ratione recusandae similique!
            </div>
            <div>
                Consequuntur eum labore minima minus natus sapiente ullam.
                Aspernatur consectetur expedita inventore quia similique tenetur
                voluptas voluptatibus voluptatum? Accusamus amet at beatae
                consequuntur cum ea eligendi, ex harum nam unde!
            </div>
            <div>
                Ad atque commodi consectetur cumque et fugit magni, maiores
                neque nesciunt, nostrum obcaecati perspiciatis qui quo repellat
                temporibus veritatis voluptatibus! Distinctio in nemo officiis
                porro repudiandae totam. Incidunt, provident, recusandae?
            </div>
            <div>
                Aspernatur at eos eveniet excepturi, hic in ipsa ipsam
                laboriosam, maiores, obcaecati placeat voluptatibus! Amet
                asperiores, atque consequatur, ex facere labore, maxime nemo non
                officiis optio quod ratione sit vel!
            </div>
            <div>
                Accusantium aliquid aperiam asperiores blanditiis, consectetur,
                dicta distinctio dolor, enim excepturi labore non perferendis
                possimus reprehenderit sit vero voluptas voluptatem. Ab aperiam,
                aut autem commodi enim laboriosam magni nulla. Nostrum?
            </div>
            <div>
                Aliquid assumenda beatae consequuntur cupiditate delectus
                dolorem ducimus, hic illum impedit minima molestias nam nihil
                non perspiciatis porro praesentium quae quos ratione recusandae
                repudiandae totam ullam ut vel vero vitae!
            </div>
            <div>
                Adipisci et illum iusto omnis qui, repudiandae? Alias cupiditate
                earum esse incidunt iure, molestias nemo nihil, nisi nostrum
                odit officia optio pariatur perferendis provident, quae quas
                quasi reiciendis voluptas. Quos.
            </div>
            <div>
                Accusantium, amet architecto asperiores atque delectus dicta
                dignissimos ducimus ea error expedita in laudantium mollitia
                natus non omnis quam quas quos rem repellendus repudiandae saepe
                sapiente sint sit velit voluptatem.
            </div>
            <div>
                Distinctio dolore, ducimus eius facere fugiat illum impedit
                maxime molestias nemo, pariatur possimus reiciendis veniam
                veritatis vero voluptate. Aperiam eligendi facilis ipsum libero
                minima quaerat, qui velit? Enim, illo sequi.
            </div>
            <div>
                Aspernatur assumenda commodi consequatur cumque dolorum ducimus
                ea exercitationem, facere illo, iure magnam maxime nulla officia
                quaerat unde voluptates voluptatibus! Commodi distinctio dolore
                incidunt, inventore iste itaque laboriosam rerum saepe!
            </div>
            <div className="flex mt-8 lg:hidden items-center">
              <p className="text-base text-gray-600 mr-3">
                  Partager cette article :
              </p>
              <div className="flex space-x-4 items-center">
                <a href="/">
                  <svg
                    className="text-brand-twitter w-4 h-3"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M14 1.414a5.533 5.533 0 01-1.65.475A3.003 3.003 0 0013.613.22a5.589 5.589 0 01-1.824.731A2.807 2.807 0 009.693 0C8.106 0 6.82 1.35 6.82 3.015c0 .237.026.467.075.688C4.508 3.577 2.39 2.376.975.552a3.117 3.117 0 00-.39 1.516c0 1.046.508 1.97 1.279 2.51a2.758 2.758 0 01-1.301-.377v.038c0 1.46.99 2.68 2.303 2.957-.423.12-.866.138-1.297.051.366 1.198 1.427 2.07 2.683 2.095A5.592 5.592 0 010 10.59a7.852 7.852 0 004.403 1.355c5.283 0 8.172-4.595 8.172-8.58 0-.13-.003-.26-.008-.39A6.008 6.008 0 0014 1.414z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
                <a href="/">
                  <svg
                    className="w-2 h-4 text-brand-facebook"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M7.714.101v2.221H6.312c-.511 0-.857.101-1.035.303-.179.202-.268.505-.268.909v1.59h2.616l-.348 2.49H5.009V14H2.277V7.614H0v-2.49h2.277V3.29c0-1.044.31-1.853.928-2.428C3.825.287 4.65 0 5.68 0c.875 0 1.553.034 2.035.101z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
                <a href="/">
                  <svg
                    className="h-4 w-4 text-brand-linkedin"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0 1.53C0 1.088.158.72.473.434.788.144 1.198 0 1.703 0c.495 0 .896.142 1.202.426.316.293.473.674.473 1.145 0 .425-.153.78-.46 1.064-.314.293-.729.44-1.242.44h-.014c-.495 0-.896-.147-1.203-.44A1.464 1.464 0 010 1.531zm.176 11.646v-8.89h3v8.89h-3zm4.662 0h3V8.212c0-.31.036-.55.108-.719.126-.301.318-.557.574-.765.257-.209.58-.313.966-.313 1.01 0 1.514.67 1.514 2.01v4.751h3V8.08c0-1.313-.315-2.31-.946-2.988-.63-.679-1.464-1.018-2.5-1.018-1.162 0-2.068.492-2.716 1.477v.027h-.014l.014-.027V4.286h-3c.018.284.027 1.166.027 2.648 0 1.482-.01 3.563-.027 6.242z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </>
);

Tutorial.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Tutorial;
