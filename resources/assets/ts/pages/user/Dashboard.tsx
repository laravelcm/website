import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

const Dashboard = () => (
  <>
    <Seo title="Mon activité" />
    <h1>Tableau de board</h1>
  </>
);

Dashboard.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Dashboard;
