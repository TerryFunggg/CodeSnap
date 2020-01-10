//
//  CircleImage.swift
//  TestSwiftUI
//
//  Created by TerryFung on 2020/1/7.
//  Copyright © 2020 TerryFung. All rights reserved.
//

import SwiftUI

struct CircleImage: View {
    var body: some View {
       Image("turtlerock")
        .clipShape(Circle())
        .overlay(
            Circle().stroke(Color.white,lineWidth: 4))
        .shadow(radius: 10)
    }
}

struct CircleImage_Previews: PreviewProvider {
    static var previews: some View {
        CircleImage()
    }
}
