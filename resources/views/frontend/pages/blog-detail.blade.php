@extends('layouts.main')

@section('content')
    <style>
        .blog-detail{
            background-color: #062358;
        }
        .blog-detail {
            /* background-color: #f9f9f9; */
            padding: 40px 0;
            font-family: 'Times New Roman', serif;
        }

        .blog__content h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .blog-content h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .blog-content p {
            font-size: 18px;
            color: #ffffff;
            line-height: 1.8;
            margin-bottom: 20px;
        }


        .blog__content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .blog__content .date {
            color: #ffffff;
            font-size: 14px;
        }

        .blog__content .meta-info {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .blog__content .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .blog-content {
            margin-top: 20px;
        }

        .blog-content p {
            margin-bottom: 20px;
        }

        .blog-content h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .blog-detail img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>

    @include('frontend.Common.whatsapplogo')

    <div class="blog-detail">
        <div class="container mx-auto lg:px-32 2xl:px-48 mt-[10%]">
            <div class="pt-10 blog__content">
                <div class="flex items-center justify-center flex-col">
                    <h1 class="text-6xl font-bold pb-6 w-[75%] text-center">GUMMY SMILE; MANAGEMENT USING LIP REPOSITIONING PROCEDURE</h1>
                    <div class="meta-info">
                        <span class="date">14 March 2024</span>
                    </div>
                </div>
                <div class="py-10">
                    <img src="https://dentcareglobaltest.s3.ap-south-1.amazonaws.com/storage/assets/uploads/cfeZgummysmile-01.jpg"
                        class="w-full h-full object-cover rounded-sm" alt="dentcare-global">
                </div>
                <div class="blog-content">
                    <h2>ABSTRACT</h2>
                    <p>'Gummy Smile' (GS) has been described as the visibility of excessive gingiva...</p>
                    <h2>INTRODUCTION</h2>
                    <p>Excessive gingival display (EGD), commonly termed gummy smile, is characterized by...</p>
                    <h2>CASE REPORT</h2>
                    <p>However, in a systematic review by Tawfiq et al., due to the smaller number of patients and the short duration of follow-up (6-18 months), they could not conclude the stability of the outcome of the procedure.<sup>2</sup></p>
                    <h2>CONCLUSION</h2>
                    <p>The lip repositioning procedure proves effective in the reduction of excessive gingival display.
                        However, the stability of outcomes in the long term has to be followed-up. Nonetheless, this
                        procedure is a promising alternative treatment option for excessive gingival display.
                    </p>
                    <div class="py-10">
                        <img src="https://dentcareglobaltest.s3.ap-south-1.amazonaws.com/storage/assets/uploads/cfeZgummysmile-01.jpg"
                            class="w-full h-full object-cover rounded-sm" alt="dentcare-global">
                    </div>
                    <p>The lip repositioning procedure proves effective in the reduction of excessive gingival display.
                        However, the stability of outcomes in the long term has to be followed-up. Nonetheless, this
                        procedure is a promising alternative treatment option for excessive gingival display.
                    </p>
                    <p>The lip repositioning procedure proves effective in the reduction of excessive gingival display.
                        However, the stability of outcomes in the long term has to be followed-up. Nonetheless, this
                        procedure is a promising alternative treatment option for excessive gingival display.
                    </p>
                    <p>The lip repositioning procedure proves effective in the reduction of excessive gingival display.
                        However, the stability of outcomes in the long term has to be followed-up. Nonetheless, this
                        procedure is a promising alternative treatment option for excessive gingival display.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
