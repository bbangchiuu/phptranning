/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.qlsv.thongtinsinhvien;

/**
 *
 * @author admin
 */
public class Teacher extends Person implements IStudy  {

    @Override
    public void joinClass() {
        System.out.println(this.fullname + " is teaching class ....");
    }
    
}
