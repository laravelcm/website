import React, { useState } from "react";
import axios from "axios";
import { useForm } from "react-hook-form";
import { InertiaLink } from "@inertiajs/inertia-react";

import Seo from "@/includes/Seo";
import LoaderButton from "@/components/LoaderButton";
import BannerAlert from "@/components/BannerAlert";

type FormData = {
  email: string;
};

export default () => {
  const [state, setState] = useState(false);
  const [status, setStatus] = useState('');
  const [message, setMessage] = useState('');
  const [sending, setSending] = useState(false);
  const {
    errors,
    register,
    setValue,
    handleSubmit,
  } = useForm<FormData>({ mode: "onChange" });
  const onSubmit = handleSubmit(({ email }) => {
    setSending(true);
    axios.post("/join-slack", { email }).then((response) => {
      setSending(false);
      setStatus(response.data.status);
      setMessage(response.data.message);
      setState(true);
      setValue('email', '');
    });
  });

  return (
    <>
      <Seo title="Rejoindre Slack" />
      <div className="border-t-4 border-brand-primary h-screen overflow-hidden">
        <div className="flex flex-col justify-between min-h-screen">
          <div className="flex flex-1 items-center justify-center w-full overflow-y-scroll">
            <div className="w-full pt-14 px-6 lg:pt-0 lg:px-0 lg:w-1/2 mx-auto text-center relative pb-24 -mt-18">
              <img src={require('@/assets/images/slack.svg')} className="h-24 w-24 md:h-32 md:w-32 mx-auto mb-4" alt="Slack Laravel Cameroun" />
              <h1 className="mb-6 text-3xl leading-tight xl:text-4xl font-semibold font-display text-brand-primary">Laravel Cameroun Slack</h1>
              <p className="text-cool-gray-600 text-sm">
                Rejoignez notre slack pour discuter a propos de Laravel, Javascript, {" "}
                Design, comment demarrer et mener un projet de bout en bout, et découvrer {" "}
                l'univers du développement au Cameroun.
              </p>
              <InertiaLink href="/" className="link block mt-2 mb-6">Revenir sur le site</InertiaLink>
              <form onSubmit={onSubmit} className="sm:flex justify-center relative">
                <input
                  type="email"
                  name="email"
                  className="bg-white rounded-md py-3 px-5 focus:outline-none focus:shadow-outline-brand md:max-w-md w-full"
                  placeholder="Entrer votre adresse email"
                  autoComplete="off"
                  ref={register({
                    required: "L'adresse E-mail est requis",
                    pattern: {
                      value: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
                      message: "Cette adresse E-mail n'est pas valide",
                    },
                  })}
                />
                <LoaderButton
                  title="Recevoir l'invitation"
                  className="w-full mt-4 sm:mt-0 sm:w-auto sm:ml-4 py-3 px-4"
                  loading={sending}
                  type="submit"
                />
              </form>
              {errors.email && <p className="text-red-500 text-sm mt-2">{errors.email?.message}</p>}
              <BannerAlert
                state={state}
                status={status}
                message={message}
                onClose={() => setState(!state)}
              />
            </div>
          </div>
          <div className="bg-white flex items-center h-18">
            <div className="container">
              <div className="flex flex-col md:flex-row justify-between items-center">
                <p className="text-xs mb-4 md:mb-0">© 2018 - {new Date().getFullYear()} Laravel Cameroun | Tous droits reservés.</p>
                <div className="flex space-x-4 text-xs text-gray-700">
                  <a href="https://facebook.com/laravelcm" className="hover:text-brand-primary" target="_blank" rel="noopener noreferrer">Facebook</a>
                  <a href="https://twitter.com/laravelcm" className="hover:text-brand-primary" target="_blank" rel="noopener noreferrer">Twitter</a>
                  <a href="https://github.com/laravelcm" className="hover:text-brand-primary" target="_blank" rel="noopener noreferrer">Github</a>
                  <a href="https://www.youtube.com/channel/UCbQPQ8q31uQmuKtyRnATLSw" className="hover:text-brand-primary" target="_blank" rel="noopener noreferrer">YouTube</a>
                  <a href="https://laravelcm.slack.com" className="hover:text-brand-primary" target="_blank" rel="noopener noreferrer">Slack</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};
