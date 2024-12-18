package com.web.bookstore.controller;

import com.web.bookstore.service.VNPAYService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.Map;
@RequestMapping("/vnpay")
@Controller
public class VNPAYController {
    @Autowired
    private VNPAYService vnpayService;
    @GetMapping("/pay")
    public ResponseEntity<String> getPay(@RequestParam("price") Long price, @RequestParam("id") Integer id)throws UnsupportedEncodingException {
        String url= vnpayService.getPay(price,id);
        return  ResponseEntity.ok(url);
    }
    @GetMapping("/returnPay")
    public ResponseEntity<Boolean> paymentCallback(@RequestParam Map<String, String> queryParams) throws IOException {
        String response=vnpayService.returnPay(queryParams.get("vnp_ResponseCode"),queryParams.get("contractId"));
        return  ResponseEntity.ok(false);
    }

}
