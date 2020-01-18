import React from "react";
import Helmet from "react-helmet";
import Layout from "@/includes/layout";

const Home = () => {
  return (
    <div>
      <Helmet>
        <title>Home</title>
      </Helmet>
      <div className="mt-32 mx-auto flex justify-center flex-col items-center w-1/2 py-32">
        <h1 className="text-4xl text-gray-700 mb-10 font-bold">Laravel Cameroun</h1>

        <div className="flex">
          <a className="mr-4 text-base text-gray-600" href="https://twitter.com/MonneyArthur">Twitter</a>
          <a className="mr-4 text-base text-gray-600" href="https://linkedin.com/in/arthurmonney">LinkedIn</a>
          <a className="mr-4 text-base text-gray-600" href="https://instagram.com/mckenziearts">Instagram</a>
          <a className="mr-4 text-base text-gray-600" href="https://dribbble.com/mckenziearts">Dribbble</a>
          <a className="mr-4 text-base text-gray-600" href="https://github.com/mckenziearts">GitHub</a>
        </div>
      </div>
    </div>
  );
};

Home.layout = (page: React.ReactNode) => <Layout children={page} />;

export default Home;
