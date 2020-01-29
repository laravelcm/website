import React from "react";

import Layout from "@/includes/layout";
import SEO from "@/includes/seo";

const Forum = () => {
  return (
    <>
      <SEO title="Forum" description="" />
    </>
  );
};

Forum.layout = (page: React.ReactNode) => <Layout child={page} />;
