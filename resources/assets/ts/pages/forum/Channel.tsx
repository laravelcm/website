import React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Header from "@/components/forum/Header";
import TabBar from "@/components/forum/TabBar";
import SearchBar from "@/components/forum/SearchBar";
import Category from "@/components/forum/Category";
import Sidebar from "@/components/forum/Sidebar";

const Channel = () => (
  <>
    <Seo
      title="Forum"
      description="Les forums communautaires sont un endroit pour discuter de tout ce qui concerne le développement / le design (UI et UX)."
    />
    <Header />
    <div className="container mt-12">
      <div className="hidden lg:flex justify-between mb-12">
        <Category slug="laravel" name="Laravel" />
        <Category slug="react" name="React" />
        <Category slug="vue" name="Vue" />
        <Category slug="javascript" name="Javascript" />
        <Category slug="html-css" name="HTML/CSS" />
        <Category slug="php" name="PHP" />
        <Category slug="design" name="Design" />
        <Category slug="feedback" name="Feedback" />
      </div>
      <div className="flex w-full">
        <Sidebar />
        <div className="w-full lg:pl-12 lg:w-9/12">
          <div className="flex items-center">
            <div className="w-full lg:w-2/3 items-center">
              <div className="hidden lg:inline-flex bg-gray-300 text-gray-700 text-sm font-medium py-2 px-4 mr-4 rounded-full items-center">
                <span className="block h-3 w-3 rounded-full bg-brand-laravel mr-2" />
                  Laravel
              </div>
              <TabBar />
            </div>
            <div className="w-full hidden lg:flex lg:w-1/3">
              <SearchBar />
            </div>
          </div>
          <div className="mt-10" />
        </div>
      </div>
    </div>
  </>
);

Channel.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Channel;
