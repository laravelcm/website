import * as React from "react";
import { render } from "react-dom";
import { InertiaApp } from "@inertiajs/inertia-react";
import { ThemeProvider } from "@chakra-ui/core";
import * as Sentry from '@sentry/browser';
import "../sass/plugins.scss";

Sentry.init({
  dsn: process.env.MIX_SENTRY_LARAVEL_DSN,
});

const app: any = document.getElementById("app");

render(
  <ThemeProvider>
    <InertiaApp
      initialPage={JSON.parse(app.dataset.page)}
      resolveComponent={(name) => import(`./pages/${name}`).then((module) => module.default)}
    />
  </ThemeProvider>,
  app,
);
