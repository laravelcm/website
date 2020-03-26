import * as React from "react";
import { usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";
import Deactivate from "@/pages/user/Forms/Deactivate";
import PersonalData from "@/pages/user/Forms/PersonalData";
import Profile from "@/pages/user/Forms/Profile";

const Account = () => {
  const { auth: { user } } = usePage();
  console.log(user);

  return (
    <>
      <Seo title="Mon compte" />
      <Menu current="account" />
      <div className="container md:px-4 mt-12">
        <Profile />

        <div className="hidden sm:block">
          <div className="py-5"><div className="border-t border-gray-300" /></div>
        </div>

        <PersonalData />

        <div className="hidden sm:block">
          <div className="py-5"><div className="border-t border-gray-300" /></div>
        </div>

        <Deactivate />
      </div>
    </>
  );
};

Account.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Account;
