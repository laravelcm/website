import React from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Tutorial from "@/components/Tutorial";
import Post from "@/components/Post";
import { PostType, ThreadType, TutorialType } from "@/utils/types";

const Home = () => {
  const {
    threads,
    posts,
    tutorials,
    popularTutorials,
  } = usePage();

  return (
    <>
      <Seo title="Accueil" />
      <div className="bg-white relative overflow-hidden">
        <img
          src={require("@/assets/images/illustration.svg")}
          className="hidden xl:block absolute right-0 -top-22"
          alt="illustration"
        />
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:pb-16 lg:pt-16 lg:pb-24 xl:pt-20 xl:pb-40">
          <div className="w-full flex relative">
            <div>
              <h1 className="text-brand-primary font-bold text-3xl mb-4 sm:mb-5 md:text-4xl lg:text-5xl lg:mb-8">Laravel Cameroun</h1>
              <p className="text-base mb-8 sm:text-lg md:mb-10 lg:max-w-2xl">
                Bienvenue sur le site de la communauté des développeurs PHP et
                Laravel du Cameroun, le plus gros rassemblement de développeurs au Cameroun.
              </p>
              <InertiaLink
                href="/jobs"
                className="p-2 sm:px-4 sm:py-2.5 bg-brand-100 items-center text-gray-700 rounded-md rounded-lg text-sm flex lg:inline-flex w-full"
                role="alert"
              >
                <span className="flex rounded-md rounded-lg bg-brand-900 uppercase px-2 py-1 font-semibold mr-4 text-white">
                  Bientôt
                </span>
                <span className="font-normal mx-2 text-left flex-auto">
                  Une nouvelle section{" "}
                  <span className="text-brand-primary">Jobs</span>{" "}
                  bientôt disponible. Cliquez pour en savoir plus!
                </span>
                <svg className="fill-current opacity-75 h-4 w-4 hidden md:block" viewBox="0 0 20 20">
                  <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                </svg>
              </InertiaLink>
              <svg className="hidden lg:block absolute xl:hidden top-0 right-0 origin-top mt-4" width="221" height="221">
                <g clipPath="url(#clip0)">
                  <path opacity=".503" fillRule="evenodd" clipRule="evenodd" d="M2.402 0a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm24.022 24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0-24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm24.022 0a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0 24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0 24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm24.021 0a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0-24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0-24.022a2.402 2.402 0 1 1 0 4.804 2.402 2.402 0 0 1 0-4.804zm0 72.065a2.402 2.402 0 1 1 0 4.805 2.402 2.402 0 0 1 0-4.805zM98.49 48.044a2.403 2.403 0 0 1 1.699 4.1 2.403 2.403 0 0 1-3.398-3.397 2.402 2.402 0 0 1 1.7-.703zm0-24.022a2.403 2.403 0 1 1 0 4.807 2.403 2.403 0 0 1 0-4.807zM98.49 0a2.403 2.403 0 1 1 0 4.807 2.403 2.403 0 0 1 0-4.807zm0 72.065a2.403 2.403 0 1 1 0 4.807 2.403 2.403 0 0 1 0-4.807zm0 24.022a2.403 2.403 0 0 1 1.699 4.101 2.405 2.405 0 0 1-3.398 0 2.403 2.403 0 0 1 1.7-4.101zm24.022-48.044a2.4 2.4 0 0 1 2.402 2.403 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402 2.404 2.404 0 0 1 2.402-2.402zm0-24.021a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402 2.404 2.404 0 0 1 2.402-2.402zm0-24.022a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402A2.404 2.404 0 0 1 122.511 0zm0 72.065a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.403 2.404 2.404 0 0 1-2.402-2.403 2.404 2.404 0 0 1 2.402-2.402zm0 24.022a2.4 2.4 0 0 1 2.402 2.402 2.402 2.402 0 1 1-2.402-2.402zm0 24.022a2.402 2.402 0 1 1 0 4.803 2.402 2.402 0 0 1 0-4.803zm24.022-72.065a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-1.699-4.1 2.404 2.404 0 0 1 1.699-.704zm0-24.022a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.403-2.402 2.405 2.405 0 0 1 2.403-2.402zm0-24.022a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.403-2.402A2.405 2.405 0 0 1 146.533 0zm0 72.065a2.4 2.4 0 0 1 2.402 2.402 2.4 2.4 0 0 1-2.402 2.403 2.404 2.404 0 0 1-2.403-2.403 2.405 2.405 0 0 1 2.403-2.402zm0 24.022a2.4 2.4 0 0 1 2.402 2.402 2.402 2.402 0 1 1-2.402-2.402zm0 24.022a2.402 2.402 0 1 1 0 4.803 2.402 2.402 0 0 1 0-4.803zm0 24.021a2.403 2.403 0 1 1-.002 4.805 2.403 2.403 0 0 1 .002-4.805zm24.021-96.087a2.404 2.404 0 0 1 2.403 2.403 2.405 2.405 0 0 1-2.403 2.402 2.4 2.4 0 0 1-2.402-2.402 2.4 2.4 0 0 1 2.402-2.402zm0-24.021a2.404 2.404 0 0 1 2.403 2.402 2.405 2.405 0 0 1-2.403 2.402 2.4 2.4 0 0 1-2.402-2.402 2.4 2.4 0 0 1 2.402-2.402zm0-24.022a2.404 2.404 0 0 1 2.403 2.402 2.405 2.405 0 0 1-2.403 2.402 2.4 2.4 0 0 1-2.402-2.402A2.4 2.4 0 0 1 170.554 0zm0 72.065a2.404 2.404 0 0 1 2.403 2.402 2.405 2.405 0 0 1-2.403 2.403 2.4 2.4 0 0 1-2.402-2.403 2.4 2.4 0 0 1 2.402-2.402zm0 24.022a2.404 2.404 0 0 1 2.403 2.402 2.406 2.406 0 0 1-2.403 2.402 2.402 2.402 0 1 1 0-4.804zm0 24.022a2.406 2.406 0 0 1 2.403 2.402 2.403 2.403 0 1 1-2.403-2.402zm0 24.021a2.407 2.407 0 0 1 2.403 2.403 2.403 2.403 0 1 1-2.403-2.403zm0 24.022a2.402 2.402 0 1 1 0 4.805 2.402 2.402 0 0 1 0-4.805zm24.022-120.108a2.404 2.404 0 0 1 2.402 2.402 2.404 2.404 0 0 1-2.402 2.402 2.4 2.4 0 0 1-2.402-2.402 2.4 2.4 0 0 1 2.402-2.402zm0-24.022a2.404 2.404 0 0 1 2.402 2.402 2.404 2.404 0 0 1-2.402 2.402 2.4 2.4 0 0 1-2.402-2.402 2.4 2.4 0 0 1 2.402-2.402zm0-24.022a2.404 2.404 0 0 1 2.402 2.402 2.404 2.404 0 0 1-2.402 2.402 2.4 2.4 0 0 1-2.402-2.402A2.4 2.4 0 0 1 194.576 0zm0 72.065a2.404 2.404 0 0 1 2.402 2.402 2.404 2.404 0 0 1-2.402 2.403 2.4 2.4 0 0 1-2.402-2.403 2.4 2.4 0 0 1 2.402-2.402zm0 24.022a2.404 2.404 0 0 1 2.402 2.402c0 .637-.253 1.248-.703 1.699a2.406 2.406 0 0 1-3.397 0 2.402 2.402 0 0 1 1.698-4.101zm0 24.022c.637 0 1.248.253 1.699.703a2.406 2.406 0 0 1 0 3.397 2.402 2.402 0 1 1-1.699-4.1zm0 24.021a2.406 2.406 0 0 1 1.699 4.101 2.402 2.402 0 1 1-1.699-4.101zm0 24.022a2.402 2.402 0 1 1 0 4.805 2.402 2.402 0 0 1 0-4.805zm0 24.022c.637 0 1.248.253 1.699.703a2.406 2.406 0 0 1 0 3.398 2.406 2.406 0 0 1-3.398 0 2.406 2.406 0 0 1 0-3.398 2.406 2.406 0 0 1 1.699-.703zm24.022-144.13A2.4 2.4 0 0 1 221 50.445a2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402 2.404 2.404 0 0 1 2.402-2.402zm0-24.022A2.4 2.4 0 0 1 221 26.424a2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402 2.404 2.404 0 0 1 2.402-2.402zm0-24.022A2.4 2.4 0 0 1 221 2.402a2.4 2.4 0 0 1-2.402 2.402 2.404 2.404 0 0 1-2.402-2.402A2.404 2.404 0 0 1 218.598 0zm0 72.065A2.4 2.4 0 0 1 221 74.467a2.4 2.4 0 0 1-2.402 2.403 2.404 2.404 0 0 1-2.402-2.403 2.404 2.404 0 0 1 2.402-2.402zm0 24.022A2.4 2.4 0 0 1 221 98.489a2.402 2.402 0 1 1-2.402-2.402zm0 24.022a2.402 2.402 0 1 1 0 4.803 2.402 2.402 0 0 1 0-4.803zm0 24.021a2.403 2.403 0 1 1-.002 4.805 2.403 2.403 0 0 1 .002-4.805zm0 24.022c.637 0 1.248.253 1.698.704a2.398 2.398 0 0 1 0 3.397 2.403 2.403 0 1 1-1.698-4.101zm0 24.022a2.402 2.402 0 1 1 0 4.803 2.402 2.402 0 0 1 0-4.803zm0 24.022a2.402 2.402 0 1 1 0 4.803 2.402 2.402 0 0 1 0-4.803z" fill="#38A169" />
                </g>
                <defs>
                  <clipPath id="clip0">
                    <path fill="#fff" transform="rotate(-180 110.5 110.5)" d="M0 0h221v221H0z" />
                  </clipPath>
                </defs>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div className="relative w-full space-y-4 mb-10 md:flex md:space-y-0 md:space-x-6 lg:space-x-8 md:mb-14 md:-mt-20 lg:-mt-32">
          <InertiaLink
            href="/jobs"
            className="flex p-4 bg-white rounded-lg shadow-md hover:shadow-lg w-full md:flex-col md:justify-between md:px-6 md:py-8"
          >
            <span className="inline-flex w-12 h-12 items-center justify-center bg-brand-primary p-3 rounded-full mr-4 md:mr-0 md:mb-4">
              <svg
                className="h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M3.41.938h13.18A3.408 3.408 0 0120 4.348v8.159a3.408 3.408 0 01-3.41 3.41H4.564L.96 18.919a.586.586 0 01-.961-.45V4.348A3.408 3.408 0 013.41.938zm13.18 13.807a2.237 2.237 0 002.238-2.238v-8.16A2.237 2.237 0 0016.59 2.11H3.41a2.237 2.237 0 00-2.238 2.239v12.87l2.804-2.337a.585.585 0 01.375-.136H16.59zM4.98 5.33h1.254c.324 0 .586.262.586.586v3.765a1.843 1.843 0 01-1.84 1.841 1.843 1.843 0 01-1.842-1.84.586.586 0 011.172 0 .67.67 0 001.339 0v-3.18h-.67a.586.586 0 010-1.172zm4.706 0a2.157 2.157 0 00-2.155 2.155v1.883c0 1.188.967 2.154 2.155 2.154a2.157 2.157 0 002.155-2.154V7.486A2.157 2.157 0 009.686 5.33zm.983 4.037a.984.984 0 01-1.966 0V7.486a.984.984 0 011.966 0v1.882zm2.469-4.037h1.883a1.84 1.84 0 011.346 3.096 1.84 1.84 0 01-1.346 3.096h-1.883a.586.586 0 01-.586-.585V5.917c0-.324.263-.586.586-.586zm.586 2.51h1.297c.886 0 .885-1.338 0-1.338h-1.297V7.84zm0 2.51h1.297c.886 0 .885-1.338 0-1.338h-1.297v1.339z"
                  fill="currentColor"
                />
              </svg>
            </span>
            <span className="block">
              <h4 className="text-gray-700 font-bold mb-1 md:mb-2">Offre d'emploi</h4>
              <p className="text-sm text-gray-500 lg:text-base">
                Consultez les offres d'emploi les plus récentes et postulez
                rapidement.
              </p>
            </span>
          </InertiaLink>
          <InertiaLink
            href="/forum"
            className="flex p-4 bg-white rounded-lg shadow-md hover:shadow-lg w-full md:flex-col md:justify-between md:px-6 md:py-8"
          >
            <span className="inline-flex w-12 h-12 items-center justify-center bg-brand-primary p-3 rounded-full mr-4 md:mr-0 md:mb-4">
              <svg
                className="h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M17.071 2.931A9.938 9.938 0 0010 0a9.938 9.938 0 00-7.072 2.931C-.718 6.575-.982 12.395 2.265 16.34c-.448.917-.976 1.529-1.575 1.822a.936.936 0 00-.511.975c.063.407.373.72.779.783.222.034.46.055.708.055 1.228 0 2.518-.423 3.595-1.164C6.71 19.59 8.34 20 9.999 20a9.934 9.934 0 007.072-2.927A9.931 9.931 0 0020 10.004a9.94 9.94 0 00-2.929-7.073zm-.8 13.338A8.815 8.815 0 0110 18.865a8.87 8.87 0 01-4.491-1.218.586.586 0 00-.285-.08.59.59 0 00-.348.117c-1.282.993-2.572 1.14-3.138 1.152.675-.503 1.24-1.282 1.714-2.366a.569.569 0 00-.097-.603C.254 12.366.418 7.03 3.728 3.723A8.816 8.816 0 0110 1.126c2.367 0 4.596.922 6.272 2.597 3.46 3.463 3.46 9.091 0 12.546zM5.786 6.522h8.428c.311 0 .569.29.569.652 0 .362-.253.652-.57.652H5.787c-.316 0-.569-.29-.569-.652 0-.362.253-.652.57-.652zm8.428 2.608H5.786c-.316 0-.569.29-.569.653 0 .362.253.652.57.652h8.427c.316 0 .569-.29.569-.652 0-.363-.258-.653-.57-.653zm-8.428 3.044h8.428c.311 0 .569.29.569.652 0 .362-.253.652-.57.652H5.787c-.316 0-.569-.29-.569-.652 0-.362.253-.652.57-.652z"
                  fill="currentColor"
                />
              </svg>
            </span>
            <span className="block">
              <h4 className="text-gray-700 font-bold mb-1 md:mb-2">Forum</h4>
              <p className="text-sm text-gray-500 lg:text-base">
                Rendez vous sur le forum pour discuter de tout ce qui concerne
                le code/design.
              </p>
            </span>
          </InertiaLink>
          <InertiaLink
            href="/join-slack"
            className="flex p-4 bg-white rounded-lg shadow-md hover:shadow-lg w-full md:flex-col md:justify-between md:px-6 md:py-8"
          >
            <span className="inline-flex w-12 h-12 items-center justify-center bg-brand-primary p-3 rounded-full mr-4 md:mr-0 md:mb-4">
              <svg
                className="h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M6.19 12.16a4.648 4.648 0 012.012 1.814.673.673 0 01-.256.933.714.714 0 01-.961-.249 3.304 3.304 0 00-2.718-1.587 2.451 2.451 0 01-.237 0c-1.12.04-2.154.64-2.718 1.587a.714.714 0 01-.961.25.672.672 0 01-.256-.934 4.638 4.638 0 012.012-1.814 2.561 2.561 0 01-.65-1.702c0-1.443 1.207-2.616 2.692-2.616 1.484 0 2.692 1.173 2.692 2.616 0 .65-.246 1.244-.65 1.702H6.19zm-1.949-.457c.666-.046 1.193-.587 1.193-1.246 0-.689-.577-1.25-1.286-1.25-.709 0-1.285.561-1.285 1.25 0 .659.527 1.2 1.192 1.246.105-.002.081-.002.186 0zm13.664 2.27a.673.673 0 01-.256.935.715.715 0 01-.96-.25 3.304 3.304 0 00-2.72-1.587 2.45 2.45 0 01-.236 0c-1.12.04-2.154.64-2.718 1.588a.714.714 0 01-.96.249.673.673 0 01-.257-.934 4.638 4.638 0 012.012-1.814 2.562 2.562 0 01-.65-1.702c0-1.443 1.208-2.616 2.692-2.616 1.484 0 2.692 1.173 2.692 2.616 0 .65-.245 1.244-.65 1.702a4.644 4.644 0 012.012 1.814zm-3.96-2.27c.665-.046 1.192-.587 1.192-1.246 0-.689-.576-1.25-1.285-1.25-.71 0-1.286.561-1.286 1.25 0 .659.527 1.2 1.193 1.246.105-.002.082-.002.186 0zm-2.109-4.886a3.304 3.304 0 00-2.76-1.59c-.094.002-.058.002-.152 0a3.304 3.304 0 00-2.76 1.59.714.714 0 01-.961.25.673.673 0 01-.257-.934 4.643 4.643 0 012.013-1.817 2.56 2.56 0 01-.651-1.702C6.308 1.173 7.515 0 9 0c1.484 0 2.692 1.173 2.692 2.614a2.56 2.56 0 01-.652 1.702 4.64 4.64 0 012.014 1.817.673.673 0 01-.257.933.714.714 0 01-.96-.25zM9.071 3.86c.676-.036 1.215-.58 1.215-1.246 0-.687-.577-1.247-1.286-1.247-.709 0-1.285.56-1.285 1.247 0 .665.539 1.21 1.215 1.246.112-.002.042-.002.141 0z"
                  fill="currentColor"
                />
              </svg>
            </span>
            <span className="block">
              <h4 className="text-gray-700 font-bold mb-1 md:mb-2">Rejoignez-nous</h4>
              <p className="text-sm text-gray-500 lg:text-base">
                Rejoignez une communauté de milliers de développeurs comme vous.
              </p>
            </span>
          </InertiaLink>
        </div>
        {tutorials.length > 0 && (
          <>
            <h2 className="text-gray-700 mb-6 text-2xl font-medium lg:text-3xl">Les derniers tutoriels</h2>
            <div className="grid gap-6 max-w-lg mx-auto md:grid-cols-2 md:max-w-3xl lg:grid-cols-3 lg:max-w-none sm:mb-18">
              {tutorials.map((tutorial: TutorialType) => <Tutorial key={tutorial.id} tutorial={tutorial} />)}
            </div>
          </>
        )}
        {posts.length > 0 && (
          <>
            <h2 className="text-gray-700 mb-6 text-2xl font-medium lg:text-3xl">Les derniers articles</h2>
            <div className="grid gap-6 max-w-lg mx-auto md:grid-cols-2 md:max-w-3xl lg:grid-cols-3 lg:max-w-none sm:mb-18">
              {posts.map((post: PostType) => <Post key={post.id} post={post} />)}
            </div>
          </>
        )}
      </div>
      <div className="bg-gradient-green text-white py-6 lg:py-16">
        <div className="container">
          <div className="space-y-8 lg:space-y-0 lg:space-x-6 lg:flex flex-grow">
            <div className="w-full lg:w-1/3">
              <h4 className="font-medium text-lg mb-4">Dernières offres d'emploi</h4>
              <ul>
                <li className="py-2">
                  <InertiaLink href="/jobs" className="flex items-center hover:text-gray-200">
                    <span className="mr-2">
                      <svg
                        className="h-3 w-3 text-white"
                        viewBox="0 0 14 14"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.758 5.612a.415.415 0 000 .55c.572.629.572 1.653 0 2.283l-3.004 3.307c-.572.63-1.502.63-2.074 0l-.452-.498c-.572-.63-.572-1.653 0-2.283l3.004-3.307a.415.415 0 000-.55.33.33 0 00-.499 0L.73 8.422a2.505 2.505 0 00-.637 1.69c0 .64.224 1.24.637 1.692l.452.497c.423.466.98.699 1.536.699s1.113-.233 1.536-.699l3.004-3.307c.846-.932.846-2.45 0-3.382a.33.33 0 00-.499 0z"
                          fill="currentColor"
                        />
                        <path
                          d="M12.457 1.196L12.005.7c-.847-.932-2.227-.932-3.073 0L5.927 4.006c-.847.931-.847 2.45 0 3.381a.33.33 0 00.499 0 .415.415 0 000-.549c-.573-.63-.573-1.653 0-2.283L9.43 1.248a1.375 1.375 0 012.075 0l.452.498c.572.63.572 1.653 0 2.283L8.953 7.336a.415.415 0 000 .549A.34.34 0 009.2 8a.33.33 0 00.248-.115l3.005-3.307c.41-.451.638-1.052.638-1.69 0-.64-.225-1.24-.635-1.692z"
                          fill="currentColor"
                        />
                      </svg>
                    </span>
                    <span className="text-sm">Coming Soon</span>
                  </InertiaLink>
                </li>
              </ul>
            </div>
            <div className="w-full lg:w-1/3">
              <h4 className="font-medium text-lg mb-4">Tutoriels populaires</h4>
              <ul>
                {
                  popularTutorials.map((popular: TutorialType) => (
                    <li className="py-2" key={popular.id}>
                      <InertiaLink href={`/tutorial/${popular.slug}`} className="flex items-center hover:text-gray-200">
                        <span className="mr-2">
                          <svg className="h-3 w-3 text-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M9.346.97a3.308 3.308 0 014.682 0c.627.624.972 1.455.972 2.34 0 .886-.345 1.717-.972 2.344l-8.584 8.582a.423.423 0 01-.607 0l-3.459-3.459-.444 3.286 2.276-.306a.432.432 0 11.115.856l-2.838.384C.467 15 .448 15 .429 15a.436.436 0 01-.303-.128.428.428 0 01-.122-.361L.64 9.799a.43.43 0 01.122-.246L9.346.971zm1.608 2.497L9.512 2.026 1.68 9.86l1.441 1.442 7.834-7.835zm-5.81 9.855l-1.41-1.41 7.834-7.834 1.409 1.41-7.834 7.834zm4.985-11.9l3.449 3.449c.36-.438.56-.982.56-1.56 0-.656-.253-1.272-.717-1.733A2.442 2.442 0 0011.69.862c-.575 0-1.122.198-1.56.56z"
                              fill="currentColor"
                            />
                          </svg>
                        </span>
                        <span className="text-sm">{popular.title}</span>
                      </InertiaLink>
                    </li>
                  ))
                }
              </ul>
            </div>
            <div className="w-full lg:w-1/3">
              <h4 className="font-medium text-lg mb-4">Les derniers sujets du Forum</h4>
              <ul>
                {
                  threads.map((thread: ThreadType) => (
                    <li className="py-2" key={thread.id}>
                      <InertiaLink
                        href={thread.path}
                        className="flex items-center hover:text-gray-200"
                      >
                        <span className="mr-2">
                          <svg
                            className="h-3 w-3 text-white"
                            viewBox="0 0 15 15"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M6.497 0c1.737 0 3.367.728 4.595 2.051C12.322 3.374 13 5.13 13 7c0 1.87-.676 3.626-1.905 4.949C9.842 13.299 8.176 14 6.494 14a6.1 6.1 0 01-3.067-.832c-.866.672-1.713.817-2.287.817-.215 0-.39-.02-.514-.041a.635.635 0 01-.509-.55.665.665 0 01.333-.687c.497-.264.833-.79 1.041-1.244-2.13-2.761-1.965-6.855.41-9.412C3.13.728 4.76 0 6.497 0zM3.58 12.348c2.26 1.43 5.132 1.033 6.987-.965 2.246-2.418 2.246-6.348-.002-8.767-2.243-2.418-5.896-2.418-8.142 0C.273 4.931.17 8.66 2.181 11.108a.433.433 0 01.091.225.438.438 0 01-.02.258c-.205.506-.557 1.157-1.115 1.595h.003c.483 0 1.215-.13 1.96-.752a.122.122 0 01.03-.023.35.35 0 01.45-.063zM4.643 8h3.714v1H4.643V8zm3.714-3H4.643v1h3.714V5z"
                              fill="currentColor"
                            />
                          </svg>
                        </span>
                        <span className="text-sm">
                          {thread.title} par:{" "}
                          <span className="font-semibold">@{thread.creator.username}</span>
                        </span>
                      </InertiaLink>
                    </li>
                  ))
                }
              </ul>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

Home.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Home;
