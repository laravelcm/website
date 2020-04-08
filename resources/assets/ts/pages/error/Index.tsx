import React from "react";
import Helmet from "react-helmet";

import Layout from "@/includes/Layout";

const Error = ({ status }: { status: any }) => {
  // @ts-ignore
  const title = {
    503: "503: Service Unavailable",
    500: "500: Server Error",
    404: "404: Introuvable",
    403: "403: Permission",
  }[status];

  // @ts-ignore
  const description = {
    503: "Désolé, Nous effectuons une maintenance. Revenez plus tard.",
    500: "Whoops, Quelque chose s'est passé sur nos serveurs.",
    404: "Wooo 😱, La ressource que vous demandez est introuvable.",
    403: "🔒, Vous ne pouvez pas accéder a cette ressource.",
  }[status];

  return (
    <>
      <Helmet title={title} />
      <div className="flex items-center justify-center">
        <div className="w-full max-w-7xl flex items-center px-4 sm:px-6 py-10 lg:py-14">
          <div className="max-w-lg">
            <h1 className="text-base sm:text-lg md:text-3xl lg:text-4xl xl:text-5xl font-medium leading-5">{title}</h1>
            <p className="mt-8 text-lg lg:text-xl leading-tight">{description}</p>
          </div>
          <div className="hidden md:block ml-6">
            <img
              src={require("@/assets/images/error.svg")}
              className="h-140"
              alt="illustration"
            />
          </div>
        </div>
      </div>
    </>
  );
};

Error.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Error;
