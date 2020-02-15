import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Publishing = () => (
  <>
    <Seo title="Mes publications" />
    <Menu current="publishing" />
  </>
);

Publishing.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Publishing;
