import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Dashboard = () => (
  <>
    <Seo title="Mon activité" />
    <div className="bg-gradient-white flex items-end h-28">
      <Menu current="dashboard" />
    </div>
  </>
);

Dashboard.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Dashboard;
