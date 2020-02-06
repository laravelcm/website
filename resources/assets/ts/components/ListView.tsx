import React from "react";

import Job from "@/components/job";

export default () => {
  return (
    <>
      <Job
        company="Kiro'o Games"
        title="Développeur NodeJS & React"
        image={require("@/assets/brands/kiroo.png")}
      />
      <Job
        company="Canal 2 international"
        title="Product Designer"
        image={require("@/assets/brands/canal2.png")}
      />
      <Job
        company="Dikalo"
        title="Developpeur Swift & React Native"
        image={require("@/assets/brands/dikalo.png")}
      />
      <Job
        company="Canal 2 international"
        title="Product Designer"
        image={require("@/assets/brands/canal2.png")}
      />
      <Job
        company="Dikalo"
        title="Developpeur Swift & React Native"
        image={require("@/assets/brands/dikalo.png")}
      />
    </>
  );
}
