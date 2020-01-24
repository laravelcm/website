import React from "react";

import Layout from "@/includes/layout";

const Tutorial = () => {
  return (
    <div>
      <h1>Page Tutoriel</h1>
    </div>
  );
}

Tutorial.layout = (page: React.ReactNode) => <Layout children={page} />;

export default Tutorial;
