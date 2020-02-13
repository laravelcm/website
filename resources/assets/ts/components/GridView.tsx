import React from "react";

import Job from "@/components/Job";

export default () => (
  <div className="-mx-2 w-full flex space-y-4 flex-col md:flex-row md:flex-wrap md:space-y-0">
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
