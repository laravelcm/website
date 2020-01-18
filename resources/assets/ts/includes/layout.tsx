import React from "react";
import Helmet from "react-helmet";

interface LayoutProps {
  children: React.ReactNode;
}

export default ({ children }: LayoutProps) => {
  return (
    <>
      <Helmet titleTemplate="%s - Laravel Cameroun" />
      <main>{children}</main>
    </>
  );
}
