import React, { useEffect } from "react";
import { render } from "react-dom";
import { InertiaApp } from "@inertiajs/inertia-react";
import { ThemeProvider } from "@chakra-ui/core";
import Prism from "prismjs";

const app: any = document.getElementById("app");

const AppComponent = () => {
  useEffect(() => {
    updateCodeSyntaxHighlighting();
  }, []);

  function updateCodeSyntaxHighlighting() {
    Prism.highlightAll();
    document.querySelectorAll("pre code").forEach((block) => {
      Prism.highlightElement(block);
    });
  }

  return (
    <ThemeProvider>
      <InertiaApp
        initialPage={JSON.parse(app.dataset.page)}
        resolveComponent={(name) => import(`./pages/${name}`).then((module) => module.default)}
      />
    </ThemeProvider>
  );
};

render(<AppComponent />, app);
