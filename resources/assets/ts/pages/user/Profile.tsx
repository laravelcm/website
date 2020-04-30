import React, { useEffect, useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import RowLoader from "@/components/Loaders/RowLoader";

import { timeAgo, profile } from "@/utils/helpers";


const Profile = () => {
  const { user } = usePage();
  const [activities, setActivities] = useState<Array<any>>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setActivities([]);
    setLoading(false);
  }, [user.activities]);

  return (
    <>
      <Seo
        title={`Profil de ${user.full_name}`}
      />
      <div className="bg-gradient-green">
        <div className="max-w-7xl mx-auto py-8 px-4 sm:px-6 md:py-12 lg:py-20">
          <div className="flex flex-col md:flex-row items-start md:justify-between">
            <div className="w-full md:w-auto flex flex-col md:flex-row items-center justify-center">
              <div className="flex-shrink-0">
                <img className="h-24 w-24 rounded-full border-4 border-white" src={user.picture} alt={user.full_name} />
              </div>
              <div className="bg-green-500 rounded-lg shadow-lg p-4 md:px-6 md:py-5 text-center text-green-100 mt-4 md:mt-0 md:ml-6 md:max-w-lg md:text-left">
                <h4 className="text-base font-medium md:text-lg">{user.full_name}</h4>
                <h6 className="text-sm text-green-200">@{user.username}</h6>
                <p className="text-xs mt-2 leading-5">Devenu Membre {timeAgo(user.created_at)}, {profile(user.key_values, 'city')}</p>
                <span className="text-xs leading-none md:hidden">{profile(user.key_values, 'biography')}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="max-w-7xl mx-auto py-8 px-4 sm:px-6">
        {loading && (
          <div className="bg-white shadow-md rounded-md overflow-hidden py-4 space-y-2">
            <RowLoader />
            <RowLoader />
            <RowLoader />
          </div>
        )}
        {
          !loading && (
            <>
              {activities.length === 0 && (
                <div className="h-125 flex flex-col items-center justify-center">
                  <img className="h-full w-full mb-2" src={require('@/assets/images/no-notifications.svg')} alt="No activities" />
                  <small className="text-gray-500 text-lg">Aucune activité pour le moment.</small>
                </div>
              )}
              {
                activities.length > 0 && (
                  <div className="bg-white shadow-md rounded-md overflow-hidden max-w-5xl" id="notifications-list">
                    <h1>bonjour</h1>
                  </div>
                )
              }
            </>)
        }
      </div>
    </>
  );
};

Profile.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Profile;
