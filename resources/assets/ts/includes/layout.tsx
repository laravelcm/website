import React from "react";
import Helmet from "react-helmet";

import Header from "@/includes/header";
import Footer from "@/includes/footer";

interface LayoutProps {
  children: React.ReactNode;
}

export default ({ children }: LayoutProps) => {
  return (
    <>
      <Helmet
        titleTemplate="%s - Laravel Cameroun"
        meta={[]}
      />
      <Header />
      <main className="py-18 w-full min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible">{children}</main>
      <Footer />
    </>
  );
}
