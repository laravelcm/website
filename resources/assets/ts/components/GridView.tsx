import React from "react";

import Job from "@/components/Job";

export default () => (
  <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 max-w-md sm:max-w-none mx-auto">
    <Job
      company="Kiro'o Games"
      title="Développeur NodeJS & React"
      image={require("@/assets/brands/kiroo.png")}
      grid
    />
    <Job
      company="Canal 2 international"
      title="Product Designer"
      image={require("@/assets/brands/canal2.png")}
      grid
    />
    <Job
      company="Dikalo"
      title="Developpeur Swift & React Native"
      image={require("@/assets/brands/dikalo.png")}
      grid
    />
    <Job
      company="Canal 2 international"
      title="Product Designer"
      image={require("@/assets/brands/canal2.png")}
      grid
    />
    <Job
      company="Dikalo"
      title="Developpeur Swift & React Native"
      image={require("@/assets/brands/dikalo.png")}
      grid
    />
  </div>
);
