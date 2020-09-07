import React from "react";

import Header from "@/includes/Header";
import Footer from "@/includes/Footer";

interface LayoutProps {
  child: React.ReactNode;
}

export default ({ child }: LayoutProps) => (
  <>
    <Header />
    <main className="pt-18">{child}</main>
    <Footer />
  </>
);
