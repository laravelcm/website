import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Account = () => (
  <>
    <Seo title="Mon compte" />
    <Menu current="account" />
  </>
);

Account.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Account;
