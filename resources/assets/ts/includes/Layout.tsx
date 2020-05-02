import React from "react";

import Header from "@/includes/Header";
import Footer from "@/includes/Footer";

interface LayoutProps {
  child: React.ReactNode;
}

export default ({ child }: LayoutProps) => (
  <>
    <Header />
    <main className="py-18 w-full min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible">
      {child}
    </main>
    <Footer />
  </>
);
