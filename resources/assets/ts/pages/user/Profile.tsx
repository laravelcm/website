import * as React from "react";
import { usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";


const Profile = () => {
  const { user } = usePage();

  return (
    <>
      <Seo title={`Profil de ${user.full_name}`} />
    </>
  );
};

Profile.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Profile;
