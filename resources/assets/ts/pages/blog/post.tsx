import React from "react";

import Layout from "@/includes/layout";
import Seo from "@/includes/seo";
import Breadcrumb from "@/includes/breadcrumb";

const Post = () => {
  return (
    <>
      <Seo
        title="Create Flexible Notification with Laravel Notify"
        description="Create Flexible Notification with Laravel Notify Description form Laravel News"
        meta={[
          {
            property: `og:url`,
            content: `https://laravelcm.com`
          },
          {
            property: `og:type`,
            content: `article`
          },
          {
            property: `og:image`,
            content: `https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2019/11/laravel-notify.png?fit=2220%2C1125&ssl=1?resize=2200%2C1125`
          }
        ]}
      />
      <Breadcrumb
        parentLink="/blog"
        parentTitle="Blog"
        title="Create Flexible Notification with Laravel Notify"
      />
      <div className="container">
        <div className="pt-10 lg:w-3/4 lg:mx-auto">
          <h1 className="text-xl text-gray-800 mb-8 lg:mb-10 font-medium sm:text-2xl md:text-3xl lg:text-5xl">Create Flexible Notification with Laravel Notify</h1>
          <div className="flex items-center justify-between mb-8 lg:mb-10">
            <span className="flex items-center">
              <img src="https://avatars2.githubusercontent.com/u/14105989?s=460&v=4" className="h-14 w-14 rounded-full mr-4" alt="Arthur Monney" />
              <span className="flex flex-col">
                <span className="text-lg text-gray-600">Arthur Monney</span>
                <small className="text-xs text-gray-400">Le 12 Janvier, 2020</small>
              </span>
            </span>
            <span className="text-gray-700 flex items-center text-sm">
              <svg className="h-4 w-4 fill-current mr-1" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.56 17.66a8 8 0 01-11.32 0L1.3 12.7a1 1 0 010-1.42l4.95-4.95a8 8 0 0111.32 0l4.95 4.95a1 1 0 010 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 008.48 0L20.38 12l-4.24-4.24a6 6 0 00-8.48 0L3.4 12l4.25 4.24h.01zM11.9 16a4 4 0 110-8 4 4 0 010 8zm0-2a2 2 0 100-4 2 2 0 000 4z" fill="currentColor" />
              </svg>
              2500 Vues
            </span>
          </div>
          <div className="w-full lg:h-116 overflow-hidden">
            <img className="bg-cover shadow-2xl rounded-lg" src="https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2019/11/laravel-notify.png?fit=2220%2C1125&ssl=1?resize=2200%2C1125" alt="Post" />
          </div>
          <div className="body-content lg:w-5/6 lg:mx-auto mt-8 lg:mt-18 text-sm lg:text-base text-gray-600 relative">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor est facere possimus voluptatem. A
              aliquam consectetur, dignissimos enim et hic in nostrum quae quas qui quibusdam quod ratione recusandae
              similique!
            </div>
            <div>Consequuntur eum labore minima minus natus sapiente ullam. Aspernatur consectetur expedita inventore
              quia similique tenetur voluptas voluptatibus voluptatum? Accusamus amet at beatae consequuntur cum ea
              eligendi, ex harum nam unde!
            </div>
            <div>Ad atque commodi consectetur cumque et fugit magni, maiores neque nesciunt, nostrum obcaecati
              perspiciatis qui quo repellat temporibus veritatis voluptatibus! Distinctio in nemo officiis porro
              repudiandae totam. Incidunt, provident, recusandae?
            </div>
            <div>Aspernatur at eos eveniet excepturi, hic in ipsa ipsam laboriosam, maiores, obcaecati placeat
              voluptatibus! Amet asperiores, atque consequatur, ex facere labore, maxime nemo non officiis optio quod
              ratione sit vel!
            </div>
            <div>Accusantium aliquid aperiam asperiores blanditiis, consectetur, dicta distinctio dolor, enim excepturi
              labore non perferendis possimus reprehenderit sit vero voluptas voluptatem. Ab aperiam, aut autem commodi
              enim laboriosam magni nulla. Nostrum?
            </div>
            <div>Aliquid assumenda beatae consequuntur cupiditate delectus dolorem ducimus, hic illum impedit minima
              molestias nam nihil non perspiciatis porro praesentium quae quos ratione recusandae repudiandae totam
              ullam ut vel vero vitae!
            </div>
            <div>Adipisci et illum iusto omnis qui, repudiandae? Alias cupiditate earum esse incidunt iure, molestias
              nemo nihil, nisi nostrum odit officia optio pariatur perferendis provident, quae quas quasi reiciendis
              voluptas. Quos.
            </div>
            <div>Accusantium, amet architecto asperiores atque delectus dicta dignissimos ducimus ea error expedita in
              laudantium mollitia natus non omnis quam quas quos rem repellendus repudiandae saepe sapiente sint sit
              velit voluptatem.
            </div>
            <div>Distinctio dolore, ducimus eius facere fugiat illum impedit maxime molestias nemo, pariatur possimus
              reiciendis veniam veritatis vero voluptate. Aperiam eligendi facilis ipsum libero minima quaerat, qui
              velit? Enim, illo sequi.
            </div>
            <div>Aspernatur assumenda commodi consequatur cumque dolorum ducimus ea exercitationem, facere illo, iure
              magnam maxime nulla officia quaerat unde voluptates voluptatibus! Commodi distinctio dolore incidunt,
              inventore iste itaque laboriosam rerum saepe!
            </div>
            <div className="flex mt-8 items-center lg:absolute top-0" style={{ left: "-70px" }}>
              <p className="text-base text-gray-600 mr-3 lg:hidden">Partager cette article :</p>
              <div className="flex space-x-4 items-center lg:flex-col lg:space-y-6 lg:space-x-0">
                <a href="/">
                  <svg className="text-brand-twitter w-4 h-3" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 1.414a5.533 5.533 0 01-1.65.475A3.003 3.003 0 0013.613.22a5.589 5.589 0 01-1.824.731A2.807 2.807 0 009.693 0C8.106 0 6.82 1.35 6.82 3.015c0 .237.026.467.075.688C4.508 3.577 2.39 2.376.975.552a3.117 3.117 0 00-.39 1.516c0 1.046.508 1.97 1.279 2.51a2.758 2.758 0 01-1.301-.377v.038c0 1.46.99 2.68 2.303 2.957-.423.12-.866.138-1.297.051.366 1.198 1.427 2.07 2.683 2.095A5.592 5.592 0 010 10.59a7.852 7.852 0 004.403 1.355c5.283 0 8.172-4.595 8.172-8.58 0-.13-.003-.26-.008-.39A6.008 6.008 0 0014 1.414z" fill="currentColor" />
                  </svg>
                </a>
                <a href="/">
                  <svg className="w-2 h-4 text-brand-facebook" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.714.101v2.221H6.312c-.511 0-.857.101-1.035.303-.179.202-.268.505-.268.909v1.59h2.616l-.348 2.49H5.009V14H2.277V7.614H0v-2.49h2.277V3.29c0-1.044.31-1.853.928-2.428C3.825.287 4.65 0 5.68 0c.875 0 1.553.034 2.035.101z" fill="currentColor" />
                  </svg>
                </a>
                <a href="/">
                  <svg className="h-4 w-4 text-brand-linkedin" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1.53C0 1.088.158.72.473.434.788.144 1.198 0 1.703 0c.495 0 .896.142 1.202.426.316.293.473.674.473 1.145 0 .425-.153.78-.46 1.064-.314.293-.729.44-1.242.44h-.014c-.495 0-.896-.147-1.203-.44A1.464 1.464 0 010 1.531zm.176 11.646v-8.89h3v8.89h-3zm4.662 0h3V8.212c0-.31.036-.55.108-.719.126-.301.318-.557.574-.765.257-.209.58-.313.966-.313 1.01 0 1.514.67 1.514 2.01v4.751h3V8.08c0-1.313-.315-2.31-.946-2.988-.63-.679-1.464-1.018-2.5-1.018-1.162 0-2.068.492-2.716 1.477v.027h-.014l.014-.027V4.286h-3c.018.284.027 1.166.027 2.648 0 1.482-.01 3.563-.027 6.242z" fill="currentColor" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

Post.layout = (page: React.ReactNode) => <Layout children={page} />;

export default Post;
