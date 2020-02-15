import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Dashboard = () => (
  <>
    <Seo title="Mon activité" />
    <Menu current="dashboard" />
  </>
);

Dashboard.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Dashboard;
