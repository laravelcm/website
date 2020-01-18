import * as React from "react";
import { render } from "react-dom";
import { InertiaApp } from "@inertiajs/inertia-react";

const app: any = document.getElementById('app');

render(
  <InertiaApp
    initialPage={JSON.parse(app.dataset.page)}
    resolveComponent={name => import(`./pages/${name}`).then(module => module.default)}
  />,
  app
);
