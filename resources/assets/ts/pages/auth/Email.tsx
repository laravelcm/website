import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Auth";
import Seo from "@/includes/Seo";
import FlashMessages from "@/includes/FlashMessages";

import TextInput from "@/components/TextInput";
import LoaderButton from "@/components/LoaderButton";

const Email = () => {
  const [sending, setSending] = useState(false);
  const { errors } = usePage();
  const [email, setEmail] = useState("");

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    setEmail(e.target.value);
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);
    Inertia.post("/password/email", { email }).then(() => {
      setSending(false);
      setEmail("");
    });
  }

  return (
    <>
      <Seo title="Mot de passe oublié?" />
      <div className="flex justify-between items-center">
        <InertiaLink href="/login">
          <svg
            className="h-6 w-6 text-gray-700"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M5.41 11H21a1 1 0 110 2H5.41l5.3 5.3a1 1 0 01-1.42 1.4l-7-7a1 1 0 010-1.4l7-7a1 1 0 011.42 1.4L5.4 11h.01z"
              fill="currentColor"
            />
          </svg>
        </InertiaLink>
        <p className="text-sm text-gray-600">
          Pas encore membre ?{" "}
          <InertiaLink href="/register" className="link">
            Créer votre compte
          </InertiaLink>
        </p>
      </div>
      <div className="w-full md:w-3/4 lg:w-125 mb-16 mt-12 mx-auto">
        <FlashMessages />
        <h1 className="text-2xl font-medium text-gray-700 mb-4">
          Mot de passe oublié?
        </h1>
        <p className="text-sm text-gray-600 mb-6">
          Saisissez l'adresse e-mail que vous avez utilisée lors de votre
          inscription et nous vous enverrons des instructions pour réinitialiser
          votre mot de passe.
        </p>
        <div className="p-8 bg-white shadow-smooth rounded-md">
          <form onSubmit={handleSubmit}>
            <div className="w-full mb-3">
              <TextInput
                label="Adresse Email"
                name="email"
                type="email"
                errors={errors.email}
                placeholder="john.doe@gmail.com"
                value={email}
                onChange={handleChange}
              />
            </div>
            <LoaderButton
              title="Envoyer les instructions par mail"
              className="mt-6"
              loading={sending}
              type="submit"
            />
          </form>
        </div>
      </div>
    </>
  );
};

Email.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Email;
