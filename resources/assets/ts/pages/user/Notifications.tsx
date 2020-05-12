import React, { useState, useEffect } from "react";
import axios from "axios";
import { usePage, InertiaLink } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown/with-html";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";
import { NotificationType } from "@/utils/types";
import { timeAgo } from "@/utils/helpers";
import RowLoader from "@/components/Loaders/RowLoader";
import NotifyAlert from "@/components/NotifyAlert";

const Notifications = () => {
  const { auth: { user } } = usePage();
  const [notifications, setNotifications] = useState<NotificationType[]>([]);
  const [loading, setLoading] = useState(true);
  const [message, setMessage] = useState("");
  const [notify, setNotify] = useState(false);

  useEffect(() => {
    setNotifications(user.notifications);
    setLoading(false);
  }, [user.notifications]);

  function readNotification(e: React.SyntheticEvent, id: number) {
    e.preventDefault();
    axios.delete(`/notifications/${id}`).then((response) => {
      setNotify(true);
      setMessage("Notification marquée comme lue.");
      setTimeout(() => setNotify(false), 2500);
      setNotifications(response.data.notifications);
    }).catch((error) => {
      setNotify(true);
      setMessage("Une erreur est survenu, veillez réessayer plus tard ou contacter l'administrateur du site si le problème persiste.");
      setTimeout(() => setNotify(false), 2500);
      console.error(error);
    });
  }

  function getActionTitle(currentAction: string) {
    switch (currentAction) {
      case 'mention':
        return "Mention";
      case 'reply':
        return "Réponse";
      default:
        return "Réponse";
    }
  }

  return (
    <>
      <Seo title="Notifications" />
      <Menu current="notifications" />
      <div className="container md:px-4 mt-12">
        <h1 className="text-brand-primary text-2xl sm:text-3xl mb-2">Gérer vos notifications</h1>
        <p className="text-sm mb-6 lg:mb-8 lg:text-base max-w-4xl">
          Cette page répertorie tous les abonnements par e-mail pour votre compte. Par exemple,
          vous avez peut-être demandé à recevoir un e-mail lorsqu' un fil de discussion particulier a été mis à jour.
          Si tel est le cas, il sera répertorié ici. N'hésitez pas à vous désinscrire comme bon vous semble.
        </p>
        {loading && (
          <div className="bg-white shadow-md rounded-md overflow-hidden max-w-5xl py-4 space-y-2">
            <RowLoader />
            <RowLoader />
            <RowLoader />
          </div>
        )}
        {
          !loading && (
            <>
              {notifications.length === 0 && (
                <div className="h-125 flex flex-col items-center justify-center">
                  <img className="h-full w-full mb-2" src={require('@/assets/images/no-notifications.svg')} alt="No notifications" />
                  <small className="text-gray-500 text-lg">Vous n'avez aucune notification non lue.</small>
                </div>
              )}
              {
                notifications.length > 0 && (
                <div className="bg-white shadow-md rounded-md overflow-hidden max-w-5xl" id="notifications-list">
                  {
                    notifications.map((notification: NotificationType) => (
                      <div className="hover:bg-gray-50 transition duration-150 ease-in-out border-t border-gray-100" key={notification.id}>
                        <div className="flex items-center px-4 py-4 sm:px-6">
                          <div className="flex-shrink-0">
                            <InertiaLink href={`/u/@/${notification.data.user_profile}`}>
                              <img className="h-8 w-8 rounded-full" src={notification.data.user_photo} alt="User profile" />
                            </InertiaLink>
                          </div>
                          <div className="pl-4 flex-1 sm:flex sm:justify-between">
                            <div>
                              <div>
                                <span className="inline-block mb-1 items-center px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
                                  {getActionTitle(notification.data.action)}
                                </span>
                              </div>
                              <div className="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                <ReactMarkdown source={notification.data.message} escapeHtml={false} />
                              </div>
                            </div>
                            <div className="mt-2 w-32 flex md:flex-col items-end md:mt-0">
                              <div className="flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <InertiaLink href={notification.data.link} className="text-gray-600 hover:text-gray-400">
                                  <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </svg>
                                </InertiaLink>
                                <button className="ml-2 text-gray-600 hover:text-gray-400" type="button" onClick={(e) => readNotification(e, notification.id)}>
                                  <svg viewBox="0 0 20 20" fill="currentColor" className="w-6 h-6">
                                    <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
                                  </svg>
                                </button>
                              </div>
                              <span className="flex items-center text-gray-600 text-xs mt-1 mr-2 md:mr-0">
                                <svg className="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {timeAgo(notification.created_at)}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    ))
                  }
                </div>)
              }
            </>)
        }
      </div>
      <NotifyAlert show={notify} onClose={() => setNotify(false)} message={message} />
    </>
  );
};

Notifications.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Notifications;
