import React, { useEffect, useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import RowLoader from "@/components/Loaders/RowLoader";

import { timeAgo, profile } from "@/utils/helpers";


const Profile = () => {
  const { user, bestReplies } = usePage();
  const [activities, setActivities] = useState<Array<any>>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setActivities([]);
    setLoading(false);
    console.log(bestReplies);
  }, [user.activities]);

  return (
    <>
      <Seo
        title={`Profil de ${user.full_name}`}
      />
      <div className="bg-gradient-green">
        <div className="max-w-7xl mx-auto py-8 px-4 sm:px-6 md:py-12 lg:py-20">
          <div className="grid grid-cols-2 gap-4 ">
            <div className="col-span-2 md:col-span-1">
              <div className="flex-shrink-0">
                <img className="h-24 w-24 lg:h-32 lg:w-32 rounded-full border-4 border-white" src={user.picture} alt={user.full_name} />
              </div>
              <div className="bg-green-500 rounded-lg shadow-lg p-4 md:px-6 md:py-5 text-center text-green-100 mt-4 md:mt-0 md:ml-6 md:max-w-lg md:text-left">
                <h4 className="text-base font-medium md:text-lg">{user.full_name}</h4>
                <h6 className="text-sm text-green-200">@{user.username}</h6>
                <p className="text-xs mt-2 leading-5">Devenu Membre {timeAgo(user.created_at)}, {profile(user.key_values, 'city')}</p>
                <span className="text-xs leading-none md:hidden">{profile(user.key_values, 'biography')}</span>
              </div>
            </div>
            <div className="hidden md:flex md:col-span-1 w-full items-end justify-end">
              <div className="grid grid-cols-3 gap-4">
                <div className="flex flex-col h-40 col-end-3 px-4 py-5 bg-green-500 text-gray-50 text-center shadow rounded-lg">
                  <div className="flex-shrink-0">
                    <svg className="h-14 w-14 text-brand-primary" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M21,4H18V3a1,1,0,0,0-1-1H7A1,1,0,0,0,6,3V4H3A1,1,0,0,0,2,5V8a4,4,0,0,0,4,4H7.54A6,6,0,0,0,11,13.91V16H10a3,3,0,0,0-3,3v2a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V19a3,3,0,0,0-3-3H13V13.91A6,6,0,0,0,16.46,12H18a4,4,0,0,0,4-4V5A1,1,0,0,0,21,4ZM6,10A2,2,0,0,1,4,8V6H6V8a6,6,0,0,0,.35,2Zm8,8a1,1,0,0,1,1,1v1H9V19a1,1,0,0,1,1-1ZM16,8A4,4,0,0,1,8,8V4h8Zm4,0a2,2,0,0,1-2,2h-.35A6,6,0,0,0,18,8V6h2Z" clipRule="evenodd" fillRule="evenodd" />
                    </svg>
                  </div>
                  <div>
                    <h4 className="text-white font-semibold mb-2 text-lg">{bestReplies}</h4>
                    <p className="text-gray-100 font-light text-sm">Meilleure(s) réponse(s) dans le Forum</p>
                  </div>
                </div>
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
