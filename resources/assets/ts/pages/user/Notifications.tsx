import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";

const Notifications = () => (
  <>
    <Seo title="Notifications" />
    <Menu current="notifications" />
  </>
);

Notifications.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Notifications;
