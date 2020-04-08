import React, { useState, useEffect } from "react";
import axios from "axios";
import { usePage, InertiaLink } from "@inertiajs/inertia-react";
import { useToast } from "@chakra-ui/core";

import { NotificationType } from "@/utils/types";
import Notification from "@/components/Notification";

export default () => {
  const [isOpen, setIsOpen] = useState(false);
  const [notifications, setNotifications] = useState<NotificationType[]>([]);
  const { auth: { user } } = usePage();
  const toast = useToast();

  useEffect(() => {
    setNotifications(user.notifications);
  }, [user.notifications]);

  function readNotification(e: React.SyntheticEvent, id: number) {
    e.preventDefault();
    axios.delete(`/notifications/${id}`).then((response) => {
      toast({
        position: `bottom-right`,
        description: `Notification marquée comme lue.`,
        status: `success`,
        duration: 2500,
        isClosable: true,
      });
      setNotifications(response.data.notifications);
    }).catch((error) => {
      toast({
        position: `bottom-right`,
        description: `Impossible de marquée cette notification comme lue.`,
        status: `error`,
        duration: 2500,
        isClosable: true,
      });
      console.error(error);
    });
  }

  return (
    <div className="relative">
      <InertiaLink
        // onClick={() => setIsOpen(!isOpen)}
        href="/notifications"
        className="relative inline-flex p-1 border-2 border-transparent text-gray-600 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out z-10"
      >
        <svg className="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        {notifications.length > 0 && (
          <span
            className="absolute h-5 w-5 flex items-center justify-center bg-brand-primary rounded-full text-white text-xs"
            style={{ top: "-5px", right: "-4px" }}
          >
            {notifications.length}
          </span>
        )}
      </InertiaLink>
      <button
        onClick={() => setIsOpen(false)}
        className={`fixed w-full h-full inset-0 bg-transparent cursor-default ${isOpen ? "" : "hidden"}`}
        tabIndex={-1}
        aria-label="Menu"
      />
      <div
        className={`absolute right-0 rounded bg-white w-96 h-100 shadow-lg mt-2 ${isOpen ? "" : "hidden"}`}
      >
        <div className="p-3 bg-gray-50 text-gray-700 border-b border-gray-100 flex items-center">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 mr-2">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span className="font-medium">Notifications</span>
        </div>
        <div id="notifications" className="overflow-y-auto h-80">
          {
            notifications.length > 0
            && notifications.map((notification: NotificationType) => (
              <Notification
                key={notification.id}
                notification={notification}
                readNotification={readNotification}
              />
            ))
          }

          {notifications.length === 0 && (
            <div className="h-80 flex flex-col items-center justify-center">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-10 h-10 mb-4">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
              <small className="text-gray-500 text-lg">Aucune notification</small>
            </div>
          )}
        </div>
        <div className="p-3 bg-gray-50 text-gray-700 border-b border-gray-100 text-center">
          <a href="/notifications" className="font-medium">Toutes les notifications</a>
        </div>
      </div>
    </div>
  );
};
