<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Request</title>
</head>

<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:Inter, Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center" style="padding:32px 16px;">

            <!-- CARD -->
            <table width="600" cellpadding="0" cellspacing="0" role="presentation"
                   style="background:#ffffff; border-radius:20px; overflow:hidden; border:1px solid #e5e7eb;">

                <!-- HEADER -->
                <tr>
                    <td style="padding:28px 32px;
                                   background:linear-gradient(135deg,#0369a1,#0e9be9);">

                        <table width="100%">
                            <tr>
                                <td>
                                    <div style="display:inline-block;
                                                    background:rgba(255,255,255,0.2);
                                                    padding:8px;
                                                    border-radius:999px;">
                                        <span style="font-size:14px;">✉️</span>
                                    </div>

                                    <div style="margin-top:12px;">
                                            <span style="color:rgba(255,255,255,0.8);
                                                         font-size:11px;
                                                         letter-spacing:1.5px;
                                                         text-transform:uppercase;">
                                                New Submission
                                            </span>

                                        <h2 style="color:#ffffff;
                                                       font-size:22px;
                                                       margin:6px 0 0 0;
                                                       font-weight:600;">
                                            Contact Request
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td style="padding:28px 32px;">

                        <!-- NAME + EMAIL -->
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="50%" style="padding-right:6px;">
                                    <div style="background:#f3f4f6;
                                                    padding:14px;
                                                    border-radius:12px;
                                                    border:1px solid #e5e7eb;">
                                        <p style="margin:0;
                                                      font-size:11px;
                                                      color:#6b7280;
                                                      text-transform:uppercase;">
                                            Name
                                        </p>
                                        <p style="margin:4px 0 0 0;
                                                      color:#111827;
                                                      font-weight:600;">
                                            {{ $name }}
                                        </p>
                                    </div>
                                </td>

                                <td width="50%" style="padding-left:6px;">
                                    <div style="background:#f3f4f6;
                                                    padding:14px;
                                                    border-radius:12px;
                                                    border:1px solid #e5e7eb;">
                                        <p style="margin:0;
                                                      font-size:11px;
                                                      color:#6b7280;
                                                      text-transform:uppercase;">
                                            Email
                                        </p>
                                        <p style="margin:4px 0 0 0;
                                                      color:#111827;
                                                      font-weight:600;
                                                      word-break:break-all;">
                                            {{ $email }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- PHONE -->
                        @if($phone)
                            <div style="margin-top:12px;
                                            background:#f3f4f6;
                                            padding:14px;
                                            border-radius:12px;
                                            border:1px solid #e5e7eb;">
                                <p style="margin:0;
                                              font-size:11px;
                                              color:#6b7280;
                                              text-transform:uppercase;">
                                    Phone
                                </p>
                                <p style="margin:4px 0 0 0;
                                              color:#111827;
                                              font-weight:600;">
                                    {{ $phone }}
                                </p>
                            </div>
                        @endif

                        <!-- DIVIDER -->
                        <div style="margin:20px 0;
                                        height:1px;
                                        background:#e5e7eb;"></div>

                        <!-- MESSAGE -->
                        <div>
                            <p style="font-size:11px;
                                          color:#6b7280;
                                          text-transform:uppercase;
                                          margin-bottom:8px;">
                                Message
                            </p>

                            <div style="background:#eff6ff;
                                            border:1px solid #dbeafe;
                                            border-radius:12px;
                                            padding:16px;">
                                <p style="margin:0;
                                              font-size:14px;
                                              color:#1f2937;
                                              line-height:1.6;">
                                    {{ $content }}
                                </p>
                            </div>
                        </div>

                        <!-- SERVICES -->
                        @if(count($services))
                            <div style="margin-top:18px;">
                                <p style="font-size:11px;
                                              color:#6b7280;
                                              text-transform:uppercase;
                                              margin-bottom:8px;">
                                    Requested Services
                                </p>

                                @foreach($services as $service)
                                    <span style="display:inline-block;
                                                     background:#0e9be9;
                                                     color:#ffffff;
                                                     font-size:12px;
                                                     padding:6px 12px;
                                                     border-radius:999px;
                                                     margin:3px 3px 0 0;">
                                            {{ $service }}
                                        </span>
                                @endforeach
                            </div>
                        @endif

                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="background:#f9fafb;
                                   border-top:1px solid #e5e7eb;
                                   padding:16px 32px;">

                        <table width="100%">
                            <tr>
                                <td style="font-size:12px; color:#6b7280;">
                                    Sent from your website
                                </td>

                                <td align="right">
                                        <span style="color:#22c55e; font-size:12px;">
                                            ● Delivered
                                        </span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
