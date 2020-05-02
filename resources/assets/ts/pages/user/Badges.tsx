import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Badges = () => (
  <>
    <Seo title="Mes badges" />
    <Menu current="badges" />
  </>
);

Badges.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Badges;
